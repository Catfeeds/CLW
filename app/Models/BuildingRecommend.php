<?php

namespace App\Models;

class BuildingRecommend extends BaseModel
{
    protected $appends = [
      'img_cn', 'array_id_cn', 'pic_url_cn', 'area_block_name', 'building_name'
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

    //楼盘
    public function building()
    {
        return $this->belongsTo('App\Models\Building');
    }

    /**
     * 说明: 获取市 区域 楼盘 的ID
     *
     * @return array
     * @author 刘坤涛
     */
    public function getArrayIdCnAttribute()
    {
        $data[] =  $this->building->area->city->id;
        $data[] = $this->building->area->id;
        $data[] = $this->building->id;
        return $data;
    }

    /**
     * 说明: 获取区域商圈名称
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function getAreaBlockNameAttribute()
    {
        return $this->building->getAddressCnAttribute();
    }

    /**
     * 说明: 楼盘名称
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function getBuildingNameAttribute()
    {
        return $this->building->name;
    }

}
