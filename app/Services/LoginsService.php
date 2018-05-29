<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\User;
use App\Redis\MasterRedis;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Token;

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
        if (empty($telCaptcha)) return ['status' => false, 'message' => '验证码失效,请重新发送'];
        // 判断验证码是否正确
        if ($request->smsCode != $telCaptcha) return ['status' => false, 'message' => '手机验证码错误，请重新输入'];
        // 验证成功，删除验证码
        $masterRedis->delKey($key);

        $user = User::where([
            'tel' => $request->tel,
        ])->first();
        if (empty($user)) return ['status' => false, 'message' => '用户不存在'];

        // 最后登录时间
        $user->last_login_time = date('Y.m.d H:i:s', time());
        $user->last_login_ip = $request->getClientIp();
        $user->last_login_source = 'App';
        // 必须为线上真实ip
        $user->last_login_city = $this->getLocation($request->getClientIp());
        $user->login_count = (int)$user->login_count + 1;
        if (!$user->save()) {
            return ['status' => false, 'message' => '登录数据跟新失败'];
        }

        // 返回token
        $token = $user->createToken($request->tel)->accessToken;
        if (empty($token)) return ['status' => false, 'message' => '获取令牌失败'];

        return ['status' => true, 'token' => $token];
    }

    /**
     * 说明: admin后台登录
     *
     * @param $request
     * @return array
     * @author 罗振
     */
    public function adminLogin($request)
    {
        $admin = Admin::where(['name' => $request->name,])->first();
        if (empty($admin)) return ['status' => false, 'message' => '用户不存在'];

        // 验证新密码与原密码
        if (!Hash::check($request->password, $admin->password)) return ['status' => false, 'message' => '密码不正确'];

        // 返回token
        $token = $admin->createToken($request->name)->accessToken;
        if (empty($token)) return ['status' => false, 'message' => '获取令牌失败'];

        return ['status' => true, 'token' => $token];
    }

    /**
     * 说明: 退出登录
     *
     * @param $guard
     * @return array
     * @author 罗振
     */
    public function logout($guard)
    {
        $user = Auth::guard($guard)->user();
        if (empty($user)) return ['status' => false, 'message' => '暂未登录'];

        $accessToken = $user->access_token;
        $token = Token::find($accessToken);
        if (empty($token)) return ['status' => false, 'message' => '暂无有效令牌'];

        if (!empty($token->delete())) {
            return ['status' => true, 'message' => '退出成功'];
        } else {
            return ['status' => true, 'message' => '退出失败'];
        }
    }

    /**
     * 说明: 微信账号密码登录
     *
     * @param $request
     * @return array
     * @author 罗振
     */
    public function webPwdLogin($request)
    {
        $user = User::where(['tel' => $request->tel])->first();
        if (empty($user)) return ['status' => false, 'message' => '用户不存在'];

        // 验证新密码与原密码
        if (!Hash::check($request->password, $user->password)) return ['status' => false, 'message' => '密码不正确'];

        session(['user' => $user]);

        // 最后登录时间
        $user->last_login_time = date('Y.m.d H:i:s', time());
        $user->last_login_ip = $request->getClientIp();
        $user->last_login_source = '微信';
        // 必须为线上真实ip
        $user->last_login_city = $this->getLocation($request->getClientIp());
        $user->login_count = (int)$user->login_count + 1;
        if (!$user->save()) {
            return ['status' => false, 'message' => '登录数据跟新失败'];
        }

        return ['status' => true, 'message' => '登录成功'];
    }

    /**
     * 说明: 短信登录
     *
     * @param $request
     * @return array
     * @author 罗振
     */
    public function quickLogin($request)
    {
        $masterRedis = new MasterRedis();

        $key = config('redisKey.STRING_SMSCODE_') . 'login:' . $request->tel;
        // 验证手机短信是否正确
        $telCaptcha = $masterRedis->getString($key, 'old');
        // 判断验证码是否存在
        if (empty($telCaptcha)) return ['status' => false, 'message' => '验证码失效,请重新发送'];
        // 判断验证码是否正确
        if ($request->smsCode != $telCaptcha) return ['status' => false, 'message' => '手机验证码错误，请重新输入'];
        // 验证成功，删除验证码
        $masterRedis->delKey($key);

        $user = User::where([
            'tel' => $request->tel,
        ])->first();
        if (empty($user)) return ['status' => false, 'message' => '用户不存在'];

        session(['user' => $user]);

        // 最后登录时间
        $user->last_login_time = date('Y.m.d H:i:s', time());
        $user->last_login_ip = $request->getClientIp();
        $user->last_login_source = '微信';
        // 必须为线上真实ip
        $user->last_login_city = $this->getLocation($request->getClientIp());
        $user->login_count = (int)$user->login_count + 1;
        if (!$user->save()) {
            return ['status' => false, 'message' => '登录数据跟新失败'];
        }

        return ['status' => true, 'message' => '登录成功'];
    }

    /**
     * 说明: ip获取地址
     *
     * @param $ip
     * @return string
     * @author 罗振
     */
    public function getLocation($ip)
    {
        // TODO
        $ip = '219.140.141.98';
        if (empty($ip)) return '参数不存在';
        if ($ip == "127.0.0.1") return "本机地址";
        $api = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=".$ip;
        $json = @file_get_contents($api);//调用新浪IP地址库
        $arr = json_decode($json, true);//解析json
        $country = $arr['country']; //取得国家
        $province = $arr['province'];//获取省份
        $city = $arr['city']; //取得城市
        if ((string)$country == "中国") {
            if ((string)($province) != (string)$city) {
                $_location = $province . $city;
            } else {
                $_location = $country . $city;
            }
        } else {
            $_location = $country;
        }
        return $_location;
    }
}