<?php

namespace App\Models;

class BuildingRecommend extends BaseModel
{
    protected $appends = [
      'img_cn'
    ];

    /**
     * 说明:
     * @return string
     * @user img_cn
     * @author 王成
     */
    public function getImgCnAttribute()
    {
        $img = config('setting.qiniu_url').$this->img;
        return $img;
    }
}
