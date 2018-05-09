<?php

namespace App\Services;

use App\Models\User;
use App\Redis\MasterRedis;
use GuzzleHttp\Client;

class LoginsService
{
    /**
     * 说明: 申请密码token
     *
     * @param $tel
     * @param $password
     * @param null $client_id
     * @param null $client_secret
     * @param string $scope
     * @return array
     * @author 罗振
     */
    public function applyPasswordToken($tel, $password, $client_id = null, $client_secret = null, $scope = '')
    {
        $data = [
            'username' => $tel,
            'password' => $password,
            'scope' => $scope??config('passport.default.scope'),
            'client_id' => $client_id??config('passport.default.client_id'),
            'client_secret' => $client_secret??config('passport.default.client_secret')
        ];
        $http = new Client();
        $result = null;
        $data['grant_type'] = 'password';
        try {
            $result = $http->post(url('/oauth/token'), [
                'form_params' => $data,
            ]);
        } catch (\Exception $e) {
            \Log::error('申请密码令牌失败：字段信息为：' . json_encode($data) . '错误：' . $e->getMessage());
            $error = explode("\n", $e->getMessage())[1];
            if ($error[strlen($error) - 1] != '}') {
                $error = $error . '"}';
            }

            if (empty(json_decode($error))) return ['status' => false, 'message' => '服务器异常，请联系管理员'];

            switch (json_decode($error)->message) {
                case 'The user credentials were incorrect.':
                    $resultData = '用户名或密码错误！';
                    break;
                case 'Client authentication failed':
                case 'The requested scope is invalid, unknown, or malformed':
                    $resultData = '客户端出错，请重新下载！';
                    break;
                default:
                    $resultData = '未知错误，请联系管理员！';
                    break;
            }
            return ['status' => false, 'message' => $resultData];
        }

        return ['success' => true, 'token' => json_decode((string)$result->getBody(), true)['access_token']];
    }

    /**
     * 说明: 短信登录
     *
     * @param $request
     * @return array
     * @author 罗振
     */
    public function smsLogin($request)
    {
        $masterRedis = new MasterRedis();

        $key = config('redisKey.STRING_SMSCODE_') . 'login:' . $request->tel;
        // 验证手机短信是否正确
        $telCaptcha = $masterRedis->getString($key, 'old');
        // 判断验证码是否存在
        if (empty($telCaptcha)) return ['status' => false, 'message' => '验证码失效,请重新发送短息'];
        // 判断验证码是否正确
        if ($request->smsCode != $telCaptcha) return ['status' => false, 'message' => '手机验证码错误，请重新输入'];
        // 验证成功，删除验证码
        $masterRedis->delKey($key);

        $user = User::where([
            'tel' => $request->tel,
        ])->first();
        if (empty($user)) {
            return ['status' => false, 'message' => '用户不存在'];
        }

        // 返回token
        $token = $user->createToken($request->tel)->accessToken;
        if (empty($token)) {
            return ['status' => false, 'message' => '获取令牌失败'];
        }

        return $token;
    }

}