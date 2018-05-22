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

        // 开始写入表
        $user = User::create([
            'tel' => $request->tel,
            'password' => bcrypt($request->password),
        ]);
        if (empty($user)) return ['status' => false, 'message' => '注册失败'];

        // 注册成功，删除验证码
        $masterRedis->delKey($key);

        // 返回token
        $token = $user->createToken($request->tel)->accessToken;
        if (empty($token)) {
            return ['status' => false, 'message' => '获取令牌失败'];
        }

        return ['status' => true, 'token' => $token];
    }
}