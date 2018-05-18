<?php

namespace App\Models;

class Service extends BaseModel
{
    protected $casts = [
        'detail' => 'array',
    ];

    protected $appends = [
        'list_icon_cn', 'home_icon_cn', 'detail_cn', 'shelf_cn', 'show_cn', 'list_icon_url', 'home_icon_url', 'detail_url'
    ];

    public function getListIconCnAttribute()
    {
        return [[
            'name' => $this->id,
            'url' => config('setting.qiniu_url').$this->list_icon
        ]];
    }

    public function getHomeIconCnAttribute()
    {
        return [[
            'name' => $this->id,
            'url' => config('setting.qiniu_url').$this->home_icon
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

    public function getDetailUrlAttribute()
    {
        return collect($this->detail)->map(function ($v) {
            return config('setting.qiniu_url').$v;
        });
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

    public function getListIconUrlAttribute()
    {
        return config('setting.qiniu_url').$this->list_icon;
    }

    public function getHomeIconUrlAttribute()
    {
        return config('setting.qiniu_url').$this->home_icon;
    }
}
