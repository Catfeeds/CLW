<?php

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