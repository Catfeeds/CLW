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
     * @return array
     * @use banner_cn
     * @author 罗振
     */
    public function getBannerCnAttribute()
    {
        $banners = config('setting.qiniu_url').$this->banner;
        return $banners;
    }

}
