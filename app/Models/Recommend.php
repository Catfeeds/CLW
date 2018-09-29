<?php

namespace App\Models;

class Recommend extends BaseModel
{
    protected $casts = [
        'building_id' => 'array',
        'building_info' => 'array',
        'building_guid' => 'array',
    ];

    protected $appends = [
        'pic_cn',
        'pic_url'
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
    
    /**
     * 说明: 图片拼接
     * @return string
     * @use pic_cn
     * @author 王成
     */
    public function getPicCnAttribute()
    {
        return config('setting.qiniu_url').$this->pic;
    }

    /**
     * 说明: 图片处理
     *
     * @return static
     * @use pic_url
     * @author 罗振
     */
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
