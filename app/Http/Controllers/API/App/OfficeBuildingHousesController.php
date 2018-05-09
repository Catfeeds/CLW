<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Models\OfficeBuildingHouse;
use App\Repositories\OfficeBuildingHousesRepository;

class OfficeBuildingHousesController extends APIBaseController
{
    /**
     * 说明: 房源列表
     *
     * @param OfficeBuildingHouse $officeBuildingHouse
     * @param OfficeBuildingHousesRepository $buildingHousesRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function show
    (
        OfficeBuildingHouse $officeBuildingHouse,
        OfficeBuildingHousesRepository $buildingHousesRepository
    )
    {
        $res = $buildingHousesRepository->getShow($officeBuildingHouse);

        return $this->sendResponse($res,'获取房源列表成功');
    }

    /**
     * 说明: 周边房源
     * @param OfficeBuildingHousesRepository $buildingHousesRepository
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function showOffice
    (
        OfficeBuildingHousesRepository $buildingHousesRepository,$id
    )
    {
        $res = $buildingHousesRepository->getShowOffice($id);

        return $this->sendResponse($res,'获取房源列表成功');
    }
}