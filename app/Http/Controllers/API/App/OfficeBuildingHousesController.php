<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Models\OfficeBuildingHouse;
use App\Repositories\OfficeBuildingHousesRepository;
use App\Services\OfficeBuildingHousesService;

class OfficeBuildingHousesController extends APIBaseController
{
    public function __construct()
    {
        $this->middleware('browseRecords')->only('show');
    }
    
    /**
     * 说明: 房源详情
     *
     * @param OfficeBuildingHouse $officeBuildingHouse
     * @param OfficeBuildingHousesService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function show
    (
        OfficeBuildingHouse $officeBuildingHouse,
        OfficeBuildingHousesService $service
    )
    {
        $service->labelShow($officeBuildingHouse);
        $res = $service->getShow($officeBuildingHouse);
        return $this->sendResponse($res,'获取房源列表成功');
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
        OfficeBuildingHousesService $service
    )
    {
        $res = $buildingHousesRepository->getShowOffice($service, $id);
        return $this->sendResponse($res,'获取相关房源信息成功');
    }

    /**
     * 说明: 找房列表区域搜索条件
     *
     * @param OfficeBuildingHousesService $officeBuildingHousesService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function blockCondition(
        OfficeBuildingHousesService $officeBuildingHousesService
    )
    {
        $res = $officeBuildingHousesService->blockCondition();
        return $this->sendResponse($res,'找房列表区域搜索条件获取成功');
    }

    /**
     * 说明: 找房列表其他搜索条件
     *
     * @param OfficeBuildingHousesService $officeBuildingHousesService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function otherCondition(
        OfficeBuildingHousesService $officeBuildingHousesService
    )
    {
        $res = $officeBuildingHousesService->otherCondition();
        return $this->sendResponse($res,'找房列表其他搜索条件获取成功');
    }
}