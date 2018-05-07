<?php

namespace App\Models;

class Recommend extends BaseModel
{
    protected $casts = [
        'building_id' => 'array',
    ];

    protected $appends = [
        'pic_cn'
    ];

    /**
     * 说明:
     * @return string
     * @use pic_cn
     * @author 王成
     */
    public function getPicCnAttribute()
    {

        $pic = config('setting.qiniu_url').$this->pic;

        return $pic;
    }
}
