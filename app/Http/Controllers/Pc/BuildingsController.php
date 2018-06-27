<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use Illuminate\Http\Request;

class BuildingsController extends Controller
{
    // 楼盘详情
    public function show(
        Request $request,
        Building $building,
        BuildingsRepository $repository,
        BuildingsService $service
    )
    {
        // 楼盘下房源基本详情
        $building = $repository->getShow($building, $service);
        // 楼盘下所有房源
        $houses = $building->house;
        // 楼盘所属商圈
        $block = $building->block;
        // 房源数量
        $building->house_count = $houses->count();
        // 获取楼盘下房源均价(楼盘下房源总价格/楼盘下房源总面积)
        $building->buildingAverage = $service->getBuildingAveragePrice($houses);
        // 商圈下房源均价
        $building->blockAverage = $service->getBlockAveragePrice($block->id);
        // 楼盘所属区域
        $areaId = $block->area->id;
        // 区域下房源均价
        $building->areaAverage = $service->getAreaAveragePrice($areaId);
        // 猜你喜欢
        $request->area_id = $areaId;   // 区域id
        $likeBuilding = array_slice($repository->buildingList($request, $service, null, true),0,4);

        return view('home.building_detail', ['building' => $building, 'likeBuilding' => $likeBuilding, 'houses' => $houses, 'block' => $block]);
    }

}
