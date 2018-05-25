<?php

namespace App\Http\Controllers\We;

use App\Http\Controllers\API\APIBaseController;
use App\Models\OfficeBuildingHouse;
use App\Repositories\OfficeBuildingHousesRepository;
use App\Services\OfficeBuildingHousesService;

class HouseController extends APIBaseController
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
        dd($house);
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
        if (empty($res = $officeBuildingHousesService->blockCondition())) return $this->sendError('找房列表区域搜索条件获取失败');
        return $this->sendResponse($res,'找房列表区域搜索条件获取成功');
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
        if (empty($res = $officeBuildingHousesService->otherCondition())) return $this->sendError('找房列表其他搜索条件获取失败');
        return $this->sendResponse($res,'找房列表其他搜索条件获取成功');
    }
}
