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
     * @return string
     * @use banner_cn
     * @author 罗振
     */
    public function getBannerCnAttribute()
    {
        return collect($this->banner)->map(function ($img) {
            return [
                'name' => $img,
                'url' => config('setting.qiniu_url') . $img
            ];
        })->values();
    }

}
