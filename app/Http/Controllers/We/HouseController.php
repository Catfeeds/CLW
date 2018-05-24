<?php

namespace App\Http\Controllers\We;

use App\Models\OfficeBuildingHouse;
use App\Repositories\OfficeBuildingHousesRepository;
use App\Services\OfficeBuildingHousesService;
use App\Http\Controllers\Controller;

class HouseController extends Controller
{
    // 房源详情以及相关房源
    public function show
    (
        $id,
        OfficeBuildingHousesService $service,
        OfficeBuildingHousesRepository $repository
    )
    {
        $officeBuildingHouse = OfficeBuildingHouse::findOrFail($id);
        // 房源数据
        $house = $service->getShow($officeBuildingHouse);
        // 相关房源
        $relHouse = $repository->getShowOffice($service, $id);
        return view('we.house_detail')->with(['house' => $house, 'relHouse' => $relHouse]);
    }

    /**
     * 说明: 找房列表区域搜索条件
     *
     * @param OfficeBuildingHousesService $officeBuildingHousesService
     * @return array
     * @author 罗振
     */
    public function blockCondition(
        OfficeBuildingHousesService $officeBuildingHousesService
    )
    {
        $res = $officeBuildingHousesService->blockCondition();
        return $res;
    }

    /**
     * 说明: 找房列表其他搜索条件
     *
     * @param OfficeBuildingHousesService $officeBuildingHousesService
     * @return array
     * @author 罗振
     */
    public function otherCondition(
        OfficeBuildingHousesService $officeBuildingHousesService
    )
    {
        $res = $officeBuildingHousesService->otherCondition();
        return $res;
    }
}
