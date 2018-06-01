<?php

return [
    /*
    |--------------------------------------------------------------------------
    | 七牛管理
    |--------------------------------------------------------------------------
    */
    // 七牛
    'qiniu_access_key' => 'c_M1yo7k90djYAgDst93NM3hLOz1XqYIKYhaNJZ4', // 七牛访问KEY
    'qiniu_secret_key' => 'Gb2K_HZbepbu-A45y646sP1NNZF3AqzY_w680d5h', // 七牛访问秘钥

    // 开发 七牛存储空间
    'qiniu_bucket' => env('QINIU_BUCKET', 'louwang-test'),
    'qiniu_url' => env('QINIU_URL', 'http://osibaji20.bkt.clouddn.com/'),// 七牛访问url

    'cdn_path' => env('CDN_PATH', ''),// cdn_path

    'version' => '?version=20180526',

    /*
    |--------------------------------------------------------------------------
    | 短信验证码失效时间（redis存储 单位秒）
    |--------------------------------------------------------------------------
    */
    'sms_life_time' => 60 * 2,// 2分钟
    //浮动价格
    'float_price' => 20,
    //浮动面积
    'float_acreage' => 10,

    // 楼盘默认图片
    'building_default_img' => 'https://cdn.chulouwang.com/app/imgs/building_none.jpg',
    // 房源默认图片
    'house_default_img' => 'https://cdn.chulouwang.com/app/imgs/house_none.jpg',



    // 客户端类型
    'app_update_version_ios' => 1,
    'app_update_version_android' => 2,
    'app_update_version_able' => 1,
    'app_update_version_del' => 2,
];