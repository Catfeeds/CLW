<?php

namespace App\Models;

class Banner extends BaseModel
{
    protected $appends = [
        'banner_cn'
    ];

    /**
     * 说明: banner处理
     *
     * @return string
     * @use banner_cn
     * @author 罗振
     */
    public function getBannerCnAttribute()
    {
        return config('setting.qiniu_url').$this->banner;
    }

}
