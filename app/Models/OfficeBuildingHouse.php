<?php

namespace App\Models;


class OfficeBuildingHouse extends BaseModel
{
    protected $guarded = [];
    protected $connection = 'media';

    protected $casts = [
        'indoor_img' => 'array',
    ];

    protected $appends = [
        'indoor_img_cn', 'renovation_cn'
    ];

    // 图片
    public function getIndoorImgCnAttribute()
    {
        return empty($this->indoor_img)?'':config('setting.qiniu_url').$this->indoor_img[0].config('setting.qiniu_suffix');
    }

    // 装修
    public function getRenovationCnAttribute()
    {
        if ($this->renovation == 1) {
            return '豪华装修';
        } elseif ($this->renovation == 2) {
            return '精装修';
        } elseif ($this->renovation == 3) {
            return '中装修';
        } elseif ($this->renovation == 4) {
            return '简装修';
        } elseif ($this->renovation == 5) {
            return '毛坯';
        } else {
            return '';
        }
    }
}
