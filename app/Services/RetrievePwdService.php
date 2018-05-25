<?php

namespace App\Services;

use App\Models\User;
use App\Redis\MasterRedis;
use Illuminate\Support\Facades\Hash;

class RetrievePwdService
{
    /**
     * 说明: 找回密码
     *
     * @param $request
     * @return array
     * @author 罗振
     */
    public function retrievePwd(
        $request
    )
    {
        $user = User::where('tel', $request->tel)->first();
        if (empty($user)) {
            return ['status' => false, 'message' => '用户不存在'];
        }

        $masterRedis = new MasterRedis();

        $key = config('redisKey.STRING_SMSCODE_') . 'retrieve_password:' . $request->tel;
        // 验证手机短信是否正确
        $telCaptcha = $masterRedis->getString($key, 'old');
        // 判断验证码是否存在
        if (empty($telCaptcha)) return ['status' => false, 'message' => '验证码失效,请重新发送'];
        // 判断验证码是否正确
        if ($request->smsCode != $telCaptcha) return ['status' => false, 'message' => '手机验证码错误，请重新输入'];

        // 验证新密码与原密码
        if (Hash::check($request->password, $user->password)) {
            return ['status' => false, 'message' => '修改密码与原密码相同'];
        }

        $user->password = bcrypt($request->password);
        if (!$user->save()) return ['status' => false, 'message' => '密码修改失败'];

        // 密码修改成功，删除验证码
        $masterRedis->delKey($key);

        return ['status' => true, 'message' => '密码修改成功'];
    }


}