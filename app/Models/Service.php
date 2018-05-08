<?php

namespace App\Models;

class Service extends BaseModel
{
    protected $casts = [
        'detail' => 'array',
    ];

    protected $appends = [
        'icon_cn', 'detail_cn'
    ];

    public function getIconCnAttribute()
    {
        return [[
            'name' => $this->id,
            'url' => config('setting.qiniu_url').$this->icon
        ]];
    }

    public function getDetailCnAttribute()
    {
        return collect($this->detail)->map(function ($img) {
            return [
                'name' => $img,
                'url' => config('setting.qiniu_url') . $img
            ];
        })->values();
    }

}
