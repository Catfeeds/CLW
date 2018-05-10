<?php

namespace App\Models;

class HotBlock extends BaseModel
{
    protected $appends = [
      'img_cn', 'buildings_number_cn', 'block_name_cn', 'img_url'
    ];

    public function block()
    {
        return $this->belongsTo('App\Models\Block','block_id','id');
    }

    public function building()
    {
        return $this->hasMany('App\Models\Building','block_id','block_id');
    }

    /**
     * 说明: 图片拼接
     * @return string
     * @use img_cn
     * @author 王成
     */
    public function getImgCnAttribute()
    {
        $img = config('setting.qiniu_url').$this->img;
        return $img;
    }

    /**
     * 说明: 获取该商圈下楼盘数量
     *
     * @return mixed
     * @use buildings_number_cn
     * @author 刘坤涛
     */
    public function getBuildingsNumberCnAttribute()
    {
        return $this->building->count();
    }

    /**
     * 说明: 获取热门商圈名称
     *
     * @return mixed
     * @use block_name_cn
     * @author 刘坤涛
     */
    public function getBlockNameCnAttribute()
    {
        return $this->block->name;
    }

    /**
     * 说明: 图片
     *
     * @return array
     * @author 刘坤涛
     */
    public function getImgUrlAttribute()
    {
        return [[
            'name' => $this->img,
            'url' => config('setting.qiniu_url') . $this->img
        ]];
    }

}
