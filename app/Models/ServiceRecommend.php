<?php

namespace App\Models;

class ServiceRecommend extends BaseModel
{
    protected $appends = [
        'pic_cn', 'pic_url'
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

    /**
     * 说明: 图片
     *
     * @return array
     * @author 刘坤涛
     */
    public function getPicUrlAttribute()
    {
        return [[
            'name' => $this->pic,
            'url' => config('setting.qiniu_url') . $this->pic
        ]];
    }

}
