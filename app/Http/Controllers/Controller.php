<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Redis\MasterRedis;
use App\Services\SmsService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 说明: 发送短信
     *
     * @param $tel
     * @param $temp
     * @return array
     * @author 罗振
     */
    public function getSmsCode(
        $tel,
        $temp
    )
    {
        // 生成6位随机验证码
        $captcha = mt_rand(100000, 999999);

        switch ($temp) {
            case 'register':
                $template = config('sms.clw.register');
                $smsTemplate = sprintf($template, $captcha, config('setting.sms_life_time') / 60, config('sms.louWang.postfix'));
                break;
            default:
                return [
                    'status' => false,
                    'message' => '模板错误'
                ];
        }

        // 判断用户是否注册
        if ($temp == 'register') {
            if (!empty(User::where('tel', $tel)->first()))
                return [
                    'status' => false,
                    'message' => '该手机号已注册!'
                ];
        }

        $smsService = new SmsService();
        if (config('sms.open')) {
            $smsRes = $smsService->sendSMS($tel, $smsTemplate);
            if ($smsRes['status'] != true) return [
                'status' => false,
                'message' => $smsRes['message']
            ];
        } else {
            Log::debug('短信发送配置关闭，发送给：' . $tel . ' 内容：' . $smsTemplate);
        }

        $masterRedis = new MasterRedis();
        // 写入redis,并且设置有效期
        $key = config('redisKey.STRING_SMSCODE_') . $temp . ':' . $tel;
        $masterRedis->addString($key, $captcha, config('setting.sms_life_time'));

        return [
            'status' => true,
            'message' => '验证码发送成功!'
        ];
    }
}
