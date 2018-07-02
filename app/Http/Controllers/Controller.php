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
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

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
    public function getSmsCode
    (
        $tel,
        $temp,
        $code
    )
    {
        if (strtolower($code) != strtolower(session('code'))) {
            return $this->sendError('验证码错误');
        }
        // 生成6位随机验证码
        $captcha = mt_rand(1000, 9999);
        switch ($temp) {
            case 'register':
                $template = config('sms.clw.register');
                $smsTemplate = sprintf($template, $captcha, config('setting.sms_life_time') / 60, config('sms.clw.postfix'));
                break;
            case 'login':
                $template = config('sms.clw.common');
                $smsTemplate = sprintf($template, config('setting.set.prefix'), $captcha, config('sms.clw.postfix'));
                break;
            case 'retrieve_password':
                $template = config('sms.clw.common');
                $smsTemplate = sprintf($template, config('setting.set.prefix'), $captcha, config('sms.clw.postfix'));
                break;
            case 'reset_tel':
                $template = config('sms.clw.common');
                $smsTemplate = sprintf($template, config('setting.set.prefix'), $captcha, config('sms.clw.postfix'));
                break;
            default:
                return $this->sendError('模板错误');
        }

        // 判断用户是否注册
        if ($temp == 'register') {
            if (!empty(User::where('tel', $tel)->first()))
                return $this->sendError('该手机号已注册');
        } elseif($temp == 'retrieve_password') {
            if (empty(User::where('tel', $tel)->first()))
                return $this->sendError('该手机号未注册');
        }

        $smsService = new SmsService();
        if (config('sms.open')) {
            $smsRes = $smsService->sendSMS($tel, $smsTemplate);
            if ($smsRes['status'] != true) return $this->sendError($smsRes['message']);
        } else {
            Log::debug('短信发送配置关闭，发送给：' . $tel . ' 内容：' . $smsTemplate);
        }

        $masterRedis = new MasterRedis();
        // 写入redis,并且设置有效期
        $key = config('redisKey.STRING_SMSCODE_') . $temp . ':' . $tel;
        $masterRedis->addString($key, $captcha, config('setting.sms_life_time'));

        return $this->sendResponse(true, '验证码发送成功');
    }

    // 发送成功请求
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];
        return response()->json($response, 200);
    }

    // 发送失败请求
    public function sendError($errorMessages = '', $code = 415)
    {
        $response = [
            'success' => false,
            'message' => $errorMessages,
        ];
        return response()->json($response, $code);
    }

    //生成图片验证码
    public function captcha()
    {
        $phrase = new PhraseBuilder();
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session()->flash('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

}
