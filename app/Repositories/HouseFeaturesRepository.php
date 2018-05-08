<?php

namespace App\Repositories;

use App\Models\HouseFeature;
use Illuminate\Database\Eloquent\Model;

class HouseFeaturesRepository extends Model
{
    /**
     * 说明: 获取房源特色列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 刘坤涛
     */
    public function houseFeatureList()
    {
        return HouseFeature::all();
    }

    /**
     * 说明: 添加楼盘特色
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function addHouseFeature($request)
    {
        return HouseFeature::create([
            'name' => $request->name,
            'weight' => $request->weight
        ]);
    }

    /**
     * 说明: 修改楼盘特色
     *
     * @param $request
     * @param $houseFeature
     * @return bool
     * @author 刘坤涛
     */
    public function updateHouseFeature($request, $houseFeature)
    {
        $houseFeature->name = $request->name;
        $houseFeature->weight = $request->weight;

        if (!$houseFeature->save()) return false;
        return true;
    }
}