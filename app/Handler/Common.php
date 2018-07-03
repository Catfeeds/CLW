<?php
/**
 * 公共方法
 * User: 罗振
 * Date: 2018/3/12
 * Time: 下午3:43
 */
namespace App\Handler;

use Illuminate\Support\Facades\Auth;

/**
 * Class Common
 * 常用工具类
 * @package App\Tools
 */
class Common
{
    /**
     * 说明: 验证手机号是否正确
     *
     * @param $mobile
     * @return bool
     * @author 罗振
     */
    public static function isMobile($mobile)
    {
        return preg_match('#^1\d{10}$#', $mobile) ? true : false;
    }

    /**
     * 说明: 获取七牛token
     *
     * @param null $accessKey
     * @param null $secretKey
     * @param null $bucket
     * @return string
     * @author 罗振
     */
    public static function getToken($accessKey = null, $secretKey = null, $bucket = null)
    {
        if (empty($accessKey)) {
            $accessKey = config('setting.qiniu_access_key');
        }
        if (empty($secretKey)) {
            $secretKey = config('setting.qiniu_secret_key');
        }
        if (empty($bucket)) {
            $bucket = config('setting.qiniu_bucket');
        }
        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);

        // 生成上传 Token
        $token = $auth->uploadToken($bucket);
        return $token;
    }

    /**
     * 说明: 分页返回
     *
     * @param $page
     * @param $data
     * @return array
     * @author 罗振
     */
    public static function pageData($page, $data)
    {
        return array(
            'current_page' => $page??1,
            'data' => $data,
            'per_page' => 10,

        );
    }


    public static function user()
    {
        return Auth::guard('admin')->user();
    }




}