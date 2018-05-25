<?php

namespace App\Http\Controllers\We;

use App\Http\Controllers\API\APIBaseController;
use App\Models\OfficeBuildingHouse;
use App\Repositories\OfficeBuildingHousesRepository;
use App\Services\HousesService;
use App\Services\OfficeBuildingHousesService;

class HouseController extends APIBaseController
{
    // 房源详情
    public function show
    (
        $id,
        HousesService $service
    )
    {

        $officeBuildingHouse = OfficeBuildingHouse::findOrFail($id);
        // 房源数据
        $house = $service->getShow($officeBuildingHouse);
        // 相关房源
        return view('we.house_detail')->with(['house' => $house]);
    }


    /**
     * 说明: 房源详情相关房源
     *
     * @param $id
     * @param OfficeBuildingHousesRepository $buildingHousesRepository
     * @param OfficeBuildingHousesService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function showOffice
    (
        $id,
        OfficeBuildingHousesRepository $buildingHousesRepository,
        HousesService $service
    )
    {
        $res = $buildingHousesRepository->getShowOffice($service, $id);
        if (!$res) return $this->sendError('该房源下无相关房源');
        return $this->sendResponse($res, '房源列表获取成功');
    }


    /**
     * 说明: 找房列表区域搜索条件
     *
     * @param OfficeBuildingHousesService $officeBuildingHousesService
     * @return array
     * @author 罗振
     */
    public function blockCondition(
        HousesService $service
    )
    {
        if (empty($res = $service->blockCondition())) return $this->sendError('找房列表区域搜索条件获取失败');
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
        HousesService $service
    )
    {
        if (empty($res = $service->otherCondition())) return $this->sendError('找房列表其他搜索条件获取失败');
        return $this->sendResponse($res,'找房列表其他搜索条件获取成功');
    }
}
