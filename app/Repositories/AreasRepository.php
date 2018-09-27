<?php

namespace App\Repositories;

use App\Models\Area;
use App\Models\Block;
use Illuminate\Database\Eloquent\Model;

class AreasRepository extends Model
{
    /**
     * 说明: 获取所有区域
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 刘坤涛
     */
    public function areaList()
    {
        return Area::all();
    }

    /**
     * 说明: 获取该区域下的所有商圈
     *
     * @param $area_guid
     * @return mixed
     * @author 刘坤涛
     */
    public function getBlockList($area_guid)
    {
        return Block::where('area_guid', $area_guid)->get();
    }
}