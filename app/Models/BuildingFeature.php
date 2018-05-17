<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildingFeature extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];
    protected $appends = ['feature_cn'];

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
}
