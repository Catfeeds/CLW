<?php

namespace App\Models;

class Information extends BaseModel
{
    //
    protected $appends = [
        'banner_cn'
    ];

    public function getBannerCnAttribute()
    {
        if (empty($this->banner)) return '';
        return config('setting.qiniu_url').$this->banner;
    }

}
