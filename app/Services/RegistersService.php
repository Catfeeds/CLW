<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\LoginRecord;
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
    public function addUser
    (
        $request
    )
    {

        $masterRedis = new MasterRedis();
        $key = config('redisKey.STRING_SMSCODE_') . 'register:' . $request->tel;
        // 验证手机短信是否正确
        $telCaptcha = $masterRedis->getString($key, 'old');
        // 判断验证码是否存在
        if (empty($telCaptcha)) return ['status' => false, 'message' => '验证码失效,请重新发送'];
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

        // 登录记录表添加
        $loginsService = new LoginsService();
        $loginRecord = LoginRecord::create([
            'user_id' => $user->id,
            'login_ip' => $request->getClientIp(),
            'login_city' => $loginsService->getLocation($request->getClientIp()),
            'login_source' => 'App'
        ]);
        if (empty($loginRecord)) return ['status' => false, 'message' => '登录记录表添加失败'];

        return ['status' => true, 'token' => $token];
    }

    /**
     * 说明: 微信注册
     *
     * @param $request
     * @return array
     * @author 罗振
     */
    public function weAddUser
    (
        $request
    )
    {
        $masterRedis = new MasterRedis();
        $key = config('redisKey.STRING_SMSCODE_') . 'register:' . $request->tel;
        // 验证手机短信是否正确
        $telCaptcha = $masterRedis->getString($key, 'old');
        // 判断验证码是否存在
        if (empty($telCaptcha)) return ['status' => false, 'message' => '验证码失效,请重新发送'];
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

        session(['user' => $user]);

        // 登录记录表添加
        $loginsService = new LoginsService();
        $loginRecord = LoginRecord::create([
            'user_id' => $user->id,
            'login_ip' => $request->getClientIp(),
            'login_city' => $loginsService->getLocation($request->getClientIp()),
            'login_source' => '微信'
        ]);
        if (empty($loginRecord)) return ['status' => false, 'message' => '登录记录表添加失败'];

        return ['status' => true, 'message' => '注册成功'];
    }

    // 添加后台管理用户
    public function addAdminUser( $request)
    {
        \DB::beginTransaction();
        try {
            $admin =  Admin::create([
                'nick_name' => $request->nick_name,
                'name' => $request->name,
                'password' => bcrypt($request->password),
            ]);
            $admin->assignRole($request->role_id);
            \DB::commit();
            return true;
        } catch(\Exception $exception) {
            \DB::rollback();
            \Log::error('用户添加失败'. $exception->getMessage());
            return false;
        }
    }

    // 修改用户信息
    public function update($admin, $request)
    {
        \DB::beginTransaction();
        try {
            if (!empty($request->password)) {
                $admin->password = bcrypt($request->password);
            }
            $admin->nick_name = $request->nick_name;
            if (!$admin->save()) throw new \Exception('修改失败');
            $admin->syncRoles($request->role_id);
            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('用修改失败'. $exception->getMessage());
            return false;
        }
    }
}