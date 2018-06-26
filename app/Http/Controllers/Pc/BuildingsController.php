<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use Illuminate\Http\Request;

class BuildingsController extends Controller
{
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

        // 房源数量
        $building->house_count = $houses->count();

        // 获取楼盘均价(楼盘下房源总价格/楼盘下房源总面积)
        $building->buildingAverage = round($houses->sum('total_price') / $houses->sum('constru_acreage'),2);

        $buildingIds = $building->block->building->pluck('id');






        dd($buildingIds);


        dd($building);


        return $building;



        return '楼盘详情页';
    }
}
