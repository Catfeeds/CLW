<?php

namespace App\Models;

class HotBlock extends BaseModel
{
    protected $appends = [
      'img_cn','buildings_number_cn','block_name_cn'
    ];

    /**
     * 说明:
     * @return string
     * @user img_cn
     * @author 王成
     */
    public function getImgCnAttribute()
    {
        //dd($this->img);
        $img = config('setting.qiniu_url').$this->img;
        return $img;
    }

    /**
     * 说明: 获取该商圈下楼盘数量
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function getBuildingsNumberCnAttribute()
    {
        return Building::where('block_id', $this->block_id)->count();
    }

    /**
     * 说明:获取热门商圈名称
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function getBlockNameCnAttribute()
    {
        return Block::where('id', $this->block_id)->first()->name;
    }

}
