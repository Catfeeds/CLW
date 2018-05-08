<?php

namespace App\Services;

use App\Models\User;
use App\Redis\MasterRedis;

class RegistersService
{
    /**
     * 说明: 注册
     *
     * @param $request
     * @return array
     * @author 罗振
     */
    public function addUser(
        $request
    )
    {
        $masterRedis = new MasterRedis();

        $key = config('redisKey.STRING_SMSCODE_') . 'register:' . $request->tel;
        // 验证手机短信是否正确
        $telCaptcha = $masterRedis->getString($key, 'old');
        // 判断验证码是否存在
        if (empty($telCaptcha)) return ['status' => false, 'message' => '验证码失效,请重新发送短息'];
        // 判断验证码是否正确
        if ($request->smsCode != $telCaptcha) return ['status' => false, 'message' => '手机验证码错误，请重新输入'];
        // 验证成功，删除验证码
        $masterRedis->delKey($key);

        // 开始写入表
        $user = User::create([
            'tel' => $request->tel,
            'password' => bcrypt($request->password),
        ]);
        if (empty($user)) return ['status' => false, 'message' => '注册失败'];

        return ['status' => true, 'message' => '注册成功'];

//        // 获取passport token
//        $token = PassportTool::applyPasswordToken([
//            'username' => $data['tel'],
//            'password' => $data['password'],
//            'client_id' => $data['client_id'],
//            'client_secret' => $data['client_secret'],
//            'scope' => $data['scope'],
//        ]);
//        if ($token['StatusCode'] != 200)
//            return response()->json($token);
//
//        $token['ResultData']['guid'] = $guid;
//        $token['ResultData']['user_role'] = '租户';
//        $token['ResultData']['user_head'] = config('setting.qiniu_url') . config('setting.default_header');
//        $token['ResultData']['user_name'] = $data['tel'];
//        $token['ResultData']['user_tel'] = $data['tel'];
//        $token['ResultData']['latelyPay'] = 0;
//        $token['ResultData']['latelyReminder'] = 0;
//        return response()->json($token);

    }
    
    
}