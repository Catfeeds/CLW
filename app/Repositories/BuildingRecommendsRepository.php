<?php

namespace App\Repositories;

use App\Models\Building;
use App\Models\BuildingRecommend;
use Illuminate\Database\Eloquent\Model;

class BuildingRecommendsRepository extends Model
{
    /**
     * 说明:  列表操作
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 王成
     */
    public function recommendList()
    {
        $buildingRecommend = BuildingRecommend::all();
        $datas = [];
        foreach ($buildingRecommend as $values)
        {
            $building = Building::find($values->building_id);

            $datas = [$building,$values];

        }
        return $datas;
    }

    /**
     * 说明: 添加操作
     * @param $request
     * @return mixed
     * @author 王成
     */
    public function addRecommend($request)
    {
        return BuildingRecommend::create([
            'building_id' => $request->building_id,
            'img' => $request->img
        ]);
    }

    /**
     * 说明: 更新操作
     * @param $request
     * @param $buildingRecommend
     * @return bool
     * @author 王成
     */
    public function updateRecommend($request, $buildingRecommend)
    {
        $buildingRecommend->building_id = $request->building_id;
        $buildingRecommend->img = $request->img;
        if(!$buildingRecommend->save()) return false;
        return true;
    }
}