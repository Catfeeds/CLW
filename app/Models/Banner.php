<?php

namespace App\Models;

class Banner extends BaseModel
{
    protected $casts = [
        'banner' => 'array',
    ];

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
        $banners = array();
        foreach ($this->banner as $v) {
            $banners[] = config('setting.qiniu_url').$v;
        }
        return $banners;
    }

}
