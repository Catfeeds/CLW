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
        return $res;
    }

    //发送短信验证码
    public function smsCode(Request $request)
    {
        //获取客户ip
        $ip = $request->getClientIp();

        //判断redis中是否存在当前访问ip

        //同一ip地址每天发送20次
        //同一电话每天5次,每小时3次
        return $this->getSmsCode($request->tel, $request->tmp);
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
