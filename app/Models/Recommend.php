<?php

namespace App\Models;

class Recommend extends BaseModel
{
    protected $casts = [
        'building_id' => 'array',
        'building_info' => 'array',
    ];

    protected $appends = [
        'pic_cn', 'pic_url', 'pc_pic_cn', 'pc_pic_url', 'pc_big_details_pic_cn', 'pc_big_details_pic_url', 'pc_small_details_pic_cn', 'pc_small_details_pic_url'
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

    // pc端图片
    public function getPcPicCnAttribute()
    {
        return config('setting.qiniu_url').$this->pc_pic;
    }

    // pc端图片
    public function getPcPicUrlAttribute()
    {
        return collect($this->pc_pic)->map(function ($img) {
            return [
                'name' => $img,
                'url' => config('setting.qiniu_url') . $img
            ];
        })->values();
    }

    // pc端大详情图片
    public function getPcBigDetailsPicCnAttribute()
    {
        return config('setting.qiniu_url').$this->pc_big_details_pic;
    }

    // pc端大详情图片
    public function getPcBigDetailsPicUrlAttribute()
    {
        return collect($this->pc_big_details_pic)->map(function ($img) {
            return [
                'name' => $img,
                'url' => config('setting.qiniu_url') . $img
            ];
        })->values();
    }

    // pc端小详情图片
    public function getPcSmallDetailsPicCnAttribute()
    {
        return config('setting.qiniu_url').$this->pc_small_details_pic;
    }

    // pc端小详情图片
    public function getPcSmallDetailsPicUrlAttribute()
    {
        return collect($this->pc_small_details_pic)->map(function ($img) {
            return [
                'name' => $img,
                'url' => config('setting.qiniu_url') . $img
            ];
        })->values();
    }

}
