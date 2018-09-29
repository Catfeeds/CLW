<?php

namespace App\Models;

class PcRecommend extends BaseModel
{
    protected $casts = [
        'building_id' => 'array',
        'building_info' => 'array',
        'building_guid' => 'array'
    ];

    protected $appends = [
        'pic_cn', 'pic_url', 'big_details_pic_cn', 'big_details_pic_url', 'small_details_pic_cn', 'small_details_pic_url'
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

    // pc端大详情图片
    public function getBigDetailsPicCnAttribute()
    {
        return config('setting.qiniu_url').$this->big_details_pic;
    }

    // pc端大详情图片
    public function getBigDetailsPicUrlAttribute()
    {
        return collect($this->big_details_pic)->map(function ($img) {
            return [
                'name' => $img,
                'url' => config('setting.qiniu_url') . $img
            ];
        })->values();
    }

    // pc端小详情图片
    public function getSmallDetailsPicCnAttribute()
    {
        return config('setting.qiniu_url').$this->small_details_pic;
    }

    // pc端小详情图片
    public function getSmallDetailsPicUrlAttribute()
    {
        return collect($this->small_details_pic)->map(function ($img) {
            return [
                'name' => $img,
                'url' => config('setting.qiniu_url') . $img
            ];
        })->values();
    }
}
