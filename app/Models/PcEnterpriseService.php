<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PcEnterpriseService extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';

    protected $appends = [
        'pc_img_cn', 'pc_img_url'
    ];

    // pc端图片
    public function getPcImgCnAttribute()
    {
        return config('setting.qiniu_url').$this->img;
    }

    // pc端图片
    public function getPcImgUrlAttribute()
    {
        return collect($this->img)->map(function ($img) {
            return [
                'name' => $img,
                'url' => config('setting.qiniu_url') . $img
            ];
        })->values();
    }

}
