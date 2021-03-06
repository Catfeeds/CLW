<?php

namespace App\Repositories;

use App\Models\BuildingRecommend;
use Illuminate\Database\Eloquent\Model;

class BuildingRecommendsRepository extends Model
{
    /**
     * 说明: 推荐楼盘列表
     *
     * @param $service
     * @return BuildingRecommend[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     * @author 刘坤涛
     */
    public function recommendList($service)
    {
        $buildingRecommend =  BuildingRecommend::with('building', 'building.area', 'building.area.city', 'building.block', 'building.house')->get();
        foreach($buildingRecommend as $v) {
            $service->getName($v);
            $service->getArrId($v);
            $service->getBuildingAddress($v);

            $v->building = $service->priceAndAcreageSection($v->building);
        }
        return $buildingRecommend;
    }

    /**
     * 说明: 添加操作
     *
     * @param $request
     * @return mixed
     * @author 王成
     */
    public function addRecommend($request)
    {
        return BuildingRecommend::create([
            'building_guid' => $request->building_guid,
            'img' => $request->img,
            'name' => $request->name
        ]);
    }

    /**
     * 说明: 更新操作
     *
     * @param $request
     * @param $buildingRecommend
     * @return bool
     * @author 王成
     */
    public function updateRecommend($request, $buildingRecommend)
    {
        $buildingRecommend->building_guid = $request->building_guid;
        $buildingRecommend->img = $request->img;
        $buildingRecommend->name = $request->name;
        if(!$buildingRecommend->save()) return false;
        return true;
    }
}