<?php

namespace App\Models;

class Recommend extends BaseModel
{
    protected $casts = [
        'building_id' => 'array',
    ];

    protected $appends = [
        'pic_cn', 'building_name'
    ];

    /**
     * 说明: 图片拼接
     * @return string
     * @use pic_cn
     * @author 王成
     */
    public function getPicCnAttribute()
    {
        return config('setting.qiniu_url').$this->pic;
    }

    /**
     * 说明: 楼盘名称
     *
     * @return static
     * @author 罗振
     */
    public function getBuildingNameAttribute()
    {
        return collect($this->building_id)->map(function ($v) {
            return Building::find($v)->name;
        });
    }
}
