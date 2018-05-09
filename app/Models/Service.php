<?php

namespace App\Models;

class Service extends BaseModel
{
    protected $casts = [
        'detail' => 'array',
    ];

    protected $appends = [
        'icon_cn', 'detail_cn', 'shelf_cn', 'show_cn', 'icon_url'
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

    public function getShelfCnAttribute()
    {
        if ($this->shelf == 1) {
            return '上架';
        } elseif ($this->shelf == 2) {
            return '下架';
        } else {
            return '上下架异常';
        }
    }

    public function getShowCnAttribute()
    {
        if ($this->show == 1) {
            return '首页显示';
        } elseif ($this->show == 2) {
            return '首页不显示';
        } else {
            return '首页是否显示异常';
        }
    }

    public function getIconUrlAttribute()
    {
        return config('setting.qiniu_url').$this->icon;
    }

}
