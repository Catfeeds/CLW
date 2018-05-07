<?php

namespace App\Models;

class BuildingRecommend extends BaseModel
{
    protected $appends = [
      'img_cn'
    ];

    /**
     * 说明: 图片拼接
     * @return string
     * @use img_cn
     * @author 王成
     */
    public function getImgCnAttribute()
    {
        return config('setting.qiniu_url').$this->img;
    }
}
