<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildingFeature extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];
    protected $appends = ['feature_cn', 'pic_cn', 'pc_pic_url', 'pc_pic_cn'];

    /**
     * 说明: 特色图片
     *
     * @author 刘坤涛
     */
    public function getFeatureCnAttribute()
    {
        return collect($this->pic)->map(function($img) {
            return [
                'name' => $img,
                'url'  => config('setting.qiniu_url') . $img
            ];
        });
    }

    public function getPicCnAttribute()
    {
        return config('setting.qiniu_url').$this->pic;
    }

    // pc端楼盘特色图片
    public function getPcPicUrlAttribute()
    {
        return collect($this->pc_pic)->map(function($img) {
            return [
                'name' => $img,
                'url'  => config('setting.qiniu_url') . $img
            ];
        });
    }

    // pc端楼盘特色图片
    public function getPcPicCnAttribute()
    {
        return config('setting.qiniu_url').$this->pc_pic;
    }

}
