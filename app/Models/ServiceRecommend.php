<?php

namespace App\Models;

class ServiceRecommend extends BaseModel
{
    protected $appends = [
        'pic_cn'
    ];

    /**
     * 说明: pic图片处理
     *
     * @return string
     * @use banner_cn
     * @author 罗振
     */
    public function getPicCnAttribute()
    {
        return config('setting.qiniu_url').$this->pic;
    }

}
