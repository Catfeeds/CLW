<?php
use \Illuminate\Support\Facades\Hash;

// 定义静态资源 path方法
if (! function_exists('res'))
{
    function res($path)
    {
        $cdn_path = config('setting.cdn_path');
        $path = $cdn_path . $path;
        return $path.config('setting.version');
    }
}

// pc端静态资源
if (! function_exists('homeRes'))
{
    function homeRes($path)
    {
        $cdn_path = config('setting.home_cdn_path');
        $path = $cdn_path . $path;
        return $path.config('setting.version');
    }
}
// 判断当前页面并赋值 PC侧边栏用
if (! function_exists('sourcePage'))
{
    function sourcePage($res)
    {
        if (empty($res)) {
            return 2;  // 首页
        }
        switch ($res) {
            case 'building_list': // 楼盘列表
                return 4;
            case 'buildings': // 楼盘详情
                return 5;
            case 'office_building_houses': // 房源详情
                return 6;
            default: // 未知引用
                return null;
        }
    }
}
/**
 * 全局辅助函数 放置处
 */

if (!function_exists('include_route_files')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function include_route_files($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}

if (!function_exists('curl')) {
    function curl($url, $method, $data = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['safeString'.':'.Hash::make('chulouwang'.date('Y-m-d',time()))]);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if ($method == 'post') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        } elseif ($method == 'put') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        } elseif ($method == 'delete') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        }
        $res = curl_exec($ch);
        curl_close($ch);
        return json_decode($res);
    }
}