<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Models\OfficeBuildingHouse;
use App\Repositories\OfficeBuildingHousesRepository;

class OfficeBuildingHousesController extends APIBaseController
{
    public function show
    (
        OfficeBuildingHouse $officeBuildingHouse,
        OfficeBuildingHousesRepository $buildingHousesRepository
    )
    {

        $res = $buildingHousesRepository->getShow($officeBuildingHouse);
        return $this->sendResponse($res,'获取房源列表成功');
    }
}