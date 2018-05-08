<?php

namespace App\Repositories;

use App\Models\BuildingFeature;
use Illuminate\Database\Eloquent\Model;

class BuildingFeaturesRepository extends Model
{
    /**
     * 说明: 获取楼盘特色列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 刘坤涛
     */
    public function buildingFeatureList()
    {
        return BuildingFeature::all();
    }

    /**
     * 说明: 添加楼盘特色
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function addBuildingFeature($request)
    {
        return BuildingFeature::create([
            'name' => $request->name,
            'weight' => $request->weight
        ]);
    }

    /**
     * 说明: 修改楼盘特色
     *
     * @param $request
     * @param $buildingFeatures
     * @return bool
     * @author 刘坤涛
     */
    public function updateBuildingFeature($request, $buildingFeatures)
    {
        $buildingFeatures->name = $request->name;
        $buildingFeatures->weight = $request->weight;

        if (!$buildingFeatures->save()) return false;
        return true;
    }
}