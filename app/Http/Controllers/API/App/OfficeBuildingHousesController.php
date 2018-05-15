<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\OfficeBuildingHousesRequest;
use App\Models\OfficeBuildingHouse;
use App\Repositories\OfficeBuildingHousesRepository;

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
     * 说明: 房源详情相关房源
     *
     * @param $id
     * @param OfficeBuildingHousesRepository $buildingHousesRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function showOffice
    (
        $id,
        OfficeBuildingHousesRepository $buildingHousesRepository
    )
    {
        $res = $buildingHousesRepository->getShowOffice($id);
        return $this->sendResponse($res,'获取相关房源信息成功');
    }
}