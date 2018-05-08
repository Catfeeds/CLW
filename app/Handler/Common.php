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
}