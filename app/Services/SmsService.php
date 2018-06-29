<?php
/**
 * 短信接口服务层
 */
namespace App\Services;

use App\Handler\Common;

class SmsService{

    //发送短信的接口地址
    protected static $apiSendUrl = null;

    //查询余额的接口地址
    protected static $apiBanlanceQueryUrl = null;

    //短信帐号从 https://zz.253.com/site/login.html 里面获取。
    protected static $apiAccount = null;

    //短信密码从 from https://zz.253.com/site/login.html 里面获取。
    protected static $apiPassword = null;

    /*
     * 初始化
     * @author
     */
    public function __construct()
    {
        self::$apiAccount = config('sms.set.account');
        self::$apiPassword = config('sms.set.password');
        self::$apiSendUrl = config('sms.set.send_url');
        self::$apiBanlanceQueryUrl = config('sms.set.banlance_query_url');
    }

    /**
     * 说明：获取状态码对应的提示信息
     *
     * @return array
     * @author
     */
    private function getStatus()
    {
        //返回的状态码
        return [
            '0' =>'发送成功',
            '101'=>'无此用户',
            '102'=>'密码错',
            '103'=>'提交过快',
            '104'=>'系统忙',
            '105'=>'敏感短信',
            '106'=>'消息长度错',
            '107'=>'错误的手机号码',
            '108'=>'手机号码个数错',
            '109'=>'无发送额度',
            '110'=>'不在发送时间内',
            '111'=>'超出该帐号当月发送额度限制',
            '112'=>'无此产品',
            '113'=>'extno格式错',
            '115'=>'自动审核驳回',
            '116'=>'签名不合法，未带签名',
            '117'=>'IP地址认证错',
            '118'=>'用户没有相应的发送权限',
            '119'=>'用户已过期',
            '120'=>'内容不是白名单',
            '121'=>'必填参数。是否需要状态报告，取值true或false',
            '122'=>'5分钟内相同帐号提交相同消息内容过多',
            '123'=>'发送类型错误(帐号发送短信接口权限)',
            '124'=>'白模板匹配错误',
            '125'=>'驳回模板匹配错误',
            '128'=>'内容解码失败'
        ];
    }

    /**
     * 发送短信需要的接口参数
     *
     * @param string $mobile 		手机号码
     * @param string $msg 			想要发送的短信内容
     * @param integer $needstatus 	是否需要状态报告 '1'为需要 '0'位不需要。
     * @return array
     */
    public function sendSMS( $mobile, $msg, $needstatus = 1)
    {
        //发送短信的接口参数
        $postArr = array (
            'un' => self::$apiAccount,
            'pw' => self::$apiPassword,
            'msg' => $msg,
            'phone' => $mobile,
            'rd' => $needstatus
        );

        // 手机号有效验证
        if (!Common::isMobile($mobile)) return ['status' => false, 'message' => '请使用有效手机号码'];

        $result = $this->curlPost(self::$apiSendUrl, $postArr);
        // 返回值字符串转数组
        $result = $this->execResult($result);

        $statusStr = self::getStatus();
        if(isset($result[1])) {
            if ($result[1] == 0) {
                return ['status' => true, 'message' => $statusStr[$result[1]]];
            } else {
                return ['status' => false, 'message' => $statusStr[$result[1]]];
            }
        }
        return ['status' => false, 'message' => '发生未知错误'];
    }

    /**
     * 查询余额
     */
    public function queryBalance()
    {
        // 查询接口参数
        $postArr = array (
            'un' => self::$apiAccount,
            'pw' => self::$apiPassword,
        );
        $result = $this->curlPost(self::$apiBanlanceQueryUrl, $postArr);
        return $result;
    }

    /**
     * 处理接口返回值
     */
    public function execResult($result)
    {
        $result=preg_split("/[,\r\n]/",$result);
        return $result;
    }

    /**
     * 说明：post请求
     *
     * @param $url
     * @param $postFields
     * @return mixed|string
     * @author
     */
    private function curlPost($url,$postFields)
    {
        $postFields = http_build_query($postFields);
        if(function_exists('curl_init')) {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            $result = curl_exec($ch);
            if (curl_errno($ch))
            {
                return 'Curl error: ' . curl_error($ch);
            }
            curl_close($ch);
        } elseif (function_exists('file_get_contents')) {
            $result=file_get_contents($url.$postFields);
        }

        return $result;
    }

    /**
     * 魔术获取
     */
    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * 魔术设置
     */
    public function __set($name,$value)
    {
        $this->$name=$value;
    }
}