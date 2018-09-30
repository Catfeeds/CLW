<?php
/**
 * 公共方法
 * User: 罗振
 * Date: 2018/3/12
 * Time: 下午3:43
 */
namespace App\Handler;

use App\Models\Agent;
use App\Models\Schedule;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Ramsey\Uuid\Uuid;

/**
 * Class Common
 * 常用工具类
 * @package App\Tools
 */
class Common
{
    // 生成guid
    public static function getUuid()
    {
        $uuid1 = Uuid::uuid1();
        return $uuid1->getHex();
    }

    // 添加工单进度
    public static function addSchedule($guid, $content)
    {
        return Schedule::create([
            'guid' => self::getUuid(),
            'work_order_guid' => $guid,
            'content' => $content
        ]);
    }

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

    //管理平台用户登录信息
    public static function user()
    {
        // 判断用户权限
        return \Illuminate\Support\Facades\Auth::guard('admin')->user();
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
     * 说明: 七牛上传图片
     *
     * @param $filePath
     * @param $key
     * @return array
     * @throws \Exception
     * @author 罗振
     */
    public static function QiniuUpload($filePath, $key)
    {
        //获得token
        $token = self::getToken();

        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new UploadManager();

        // 调用 UploadManager 的 putFile 方法进行文件的上传
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        $res = ['status' => true, 'url' => config('setting.qiniu_url') . $key];

        if (!$err == null) return ['status' => false, 'msg' => $err];

        return $res;
    }

    /**
     * 说明: 分页返回
     *
     * @param $page
     * @param $data
     * @param $total
     * @return array
     * @author 罗振
     */
    public static function pageData(
        $page,
        $data,
        $total
    )
    {
        return array(
            'current_page' => $page??1,
            'data' => $data,
            'per_page' => 10,
            'total' => $total
        );
    }

    /**
     * 说明: 数组转对象
     *
     * @param $e
     * @return object|void
     * @author 罗振
     */
    public static function arrayToObject($e)
    {

        if (gettype($e) != 'array') return;
        foreach ($e as $k => $v) {
            if (gettype($v) == 'array' || getType($v) == 'object')
                $e[$k] = (object)self::arrayToObject($v);
        }
        return (object)$e;
    }

    /**
     * 说明: 对象转数组
     *
     * @param $e
     * @return array|void
     * @author 罗振
     */
    public static function objectToArray($e)
    {
        $e = (array)$e;
        foreach ($e as $k => $v) {
            if (gettype($v) == 'resource') return;
            if (gettype($v) == 'object' || gettype($v) == 'array')
                $e[$k] = (array)self::objectToArray($v);
        }
        return $e;
    }

}