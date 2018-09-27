<?php

namespace App\Models;

class BuildingRecommend extends BaseModel
{
    protected $appends = [
        'img_cn',
        'pic_url_cn'
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

    /**
     * 说明: 编辑页面图片拼接
     *
     * @return array
     * @author 刘坤涛
     */
    public function getPicUrlCnAttribute()
    {
        return [
            [
                'name' => $this->img,
                'url' => config('setting.qiniu_url').$this->img
            ]
        ];
    }

    // 楼盘
    public function building()
    {
        return $this->belongsTo('App\Models\Building','building_guid','guid');
    }



}
