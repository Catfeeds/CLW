<?php

namespace App\Models;

class PcServiceRecommend extends BaseModel
{
    protected $appends = [
        'pic_cn', 'pic_url'
    ];

    // pc端图片
    public function getPicCnAttribute()
    {
        return config('setting.qiniu_url').$this->pic;
    }

    // pc端图片
    public function getPicUrlAttribute()
    {
        return collect($this->pic)->map(function ($img) {
            return [
                'name' => $img,
                'url' => config('setting.qiniu_url') . $img
            ];
        })->values();
    }
}
