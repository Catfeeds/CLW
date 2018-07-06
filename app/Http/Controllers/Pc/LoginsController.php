<?php

namespace App\Http\Controllers\PC;

use App\Http\Controllers\Controller;
use App\Services\LoginsService;
use Illuminate\Http\Request;

class LoginsController extends Controller
{
    //快捷登录
    public function store
    (
        Request $request,
        LoginsService $service
    )
    {
        $res = $service->fastLogin($request);
        if (!$res['status']) return $this->sendError($res['message']);
        return $this->sendResponse(true, '登录成功');
    }

    //发送短信验证码
    public function smsCode(Request $request)
    {
        $res = $this->verification($request->getClientIp(), $request->tel);
        if (!$res['status']) return $this->sendError($res['message']);
        return $this->getSmsCode($request->tel, $request->tmp);
    }

    
    //验证同一ip,电话,发送次数
    public function verification($ip, $tel)
    {
//        dd(\Redis::flushall());
        //将ip地址中的. 替换成_
        $ip = str_replace('.','_',$ip);
        //同一ip地址每天发送20次
        //判断redis中是否存在当前访问ip
        if (!\Redis::exists($ip)) {
            //如果不存在,将ip存入redis,次数设置为1
            \Redis::hset($ip,'num', 1);
            //设置redis过期时间,过期时间是第一次发送时间到明天凌晨
            $ip_expire = strtotime(date('Y-m-d',strtotime('+1 day'))) - time();
            \Redis::expire($ip,$ip_expire);
        } else {
            //如果存在,判断第几次访问
            if (\Redis::hget($ip,'num') > 20) return ['status' => false, 'message' => '短息发送次数过多'];
        }
        //同一电话每天5次,每小时3次
        //判断redis中是否存在当前电话
        $ip_num = \Redis::hget($ip,'num');
        if (!\Redis::exists($tel)) {
            //如果不存在,将电话存入redis,并记录时间
            \Redis::hset($tel,'num',1);
            \Redis::hset($tel,'time',time());
            //ip发送次数 +1
            \Redis::hset($ip,'num', $ip_num + 1);
            //设置redis过期时间,过期时间是第一次发送时间到明天凌晨
            $tel_expire = strtotime(date('Y-m-d',strtotime('+1 day'))) - time();
            \Redis::expire($tel,$tel_expire);
        } else {
            //如果存在,判断当前时间距第一次发送时间小于1小时,并且发送次数小于5次
            $num = \Redis::hget($tel,'num');
            $time = \Redis::hget($tel,'time');
            //判断是否已用完总次数
            if ($num < 5) {
                //如果次数小于3次,则可以继续发送
                $ip_num = \Redis::hget($ip,'num');
                if ($num < 3) {
                    \Redis::hset($tel,'num', $num + 1);
                    \Redis::hset($ip,'num', $ip_num + 1);
                    //如果是第4次发送,则判断时间是否在一小时内
                } elseif (time() - $time > 3600) {
                    \Redis::hset($tel,'num', $num + 1);
                    \Redis::hset($ip,'num', $ip_num + 1);
                } else {
                    return ['status' => false, 'message' => '操作频繁,请稍后在试'];
                }
            } else {
                return ['status' => false, 'message' => '短信发送次数上限'];
            }
        }
        return ['status' => true, 'message' => '成功'];
    }


    //退出登录
    public function logout()
    {
        if (session()->has('user')) {
            session()->flush('user');
        }
        return redirect()->back();
    }

}
