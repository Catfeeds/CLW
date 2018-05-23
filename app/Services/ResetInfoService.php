<?php

namespace App\Services;

use App\Redis\MasterRedis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ResetInfoService
{
    /**
     * 说明: 修改密码
     *
     * @param $request
     * @return array
     * @author 罗振
     */
    public function resetPwd(
        $request
    )
    {
        if ($request->old_pwd == $request->new_pwd) return ['status' => false, 'message' => '旧密码不能与新密码重复'];

        $user = $this->user();

        // 验证旧密码
        if (!Hash::check($request->old_pwd, $user->password)) {
            return ['status' => false, 'message' => '输入的旧密码不正确'];
        }

        $user->password = bcrypt($request->new_pwd);
        if (!$user->save()) return ['status' => false, 'message' => '密码修改失败'];

        return ['status' => true, 'message' => '密码修改成功'];
    }

    /**
     * 说明: 旧手机号验证
     *
     * @param $request
     * @return array
     * @author 罗振
     */
    public function oldTelValidate($request)
    {
        $user = $this->user();
        if ($user->tel != $request->tel) return ['status' => false, 'message' => '手机号与登录账号手机号不一致'];

        $masterRedis = new MasterRedis();
        $key = config('redisKey.STRING_SMSCODE_') . 'reset_tel:' . $request->tel;
        // 验证手机短信是否正确
        $telCaptcha = $masterRedis->getString($key, 'old');
        // 判断验证码是否存在
        if (empty($telCaptcha)) return ['status' => false, 'message' => '验证码失效,请重新发送短息'];
        // 判断验证码是否正确
        if ($request->smsCode != $telCaptcha) return ['status' => false, 'message' => '手机验证码错误，请重新输入'];

        // 密码修改成功，删除验证码
        $masterRedis->delKey($key);

        return ['status' => true, 'message' => '验证成功'];
    }

    /**
     * 说明: 换绑手机号
     *
     * @param $request
     * @return array
     * @author 罗振
     */
    public function resetTel($request)
    {
        $user = $this->user();
        if ($user->tel == $request->tel) return ['status' => false, 'message' => '绑定手机号不能与旧手机号相同'];

        $masterRedis = new MasterRedis();
        $key = config('redisKey.STRING_SMSCODE_') . 'reset_tel:' . $request->tel;
        // 验证手机短信是否正确
        $telCaptcha = $masterRedis->getString($key, 'old');
        // 判断验证码是否存在
        if (empty($telCaptcha)) return ['status' => false, 'message' => '验证码失效,请重新发送短息'];
        // 判断验证码是否正确
        if ($request->smsCode != $telCaptcha) return ['status' => false, 'message' => '手机验证码错误，请重新输入'];

        $user->tel = $request->tel;
        if (!$user->save()) return ['status' => false, 'message' => '新手机号绑定失败'];

        // 密码修改成功，删除验证码
        $masterRedis->delKey($key);

        return ['status' => true, 'message' => '新手机号绑定成功'];
    }

    /**
     * 说明: 用户
     *
     * @return mixed
     * @author 罗振
     */
    public function user()
    {
        if (!empty(Auth::guard('api')->user())) {
            return Auth::guard('api')->user();
        } else {
            return Session::get('user');
        }
    }

}