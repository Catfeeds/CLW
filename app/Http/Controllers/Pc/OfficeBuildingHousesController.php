<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Models\OfficeBuildingHouse;
use App\Repositories\OfficeBuildingHousesRepository;
use App\Services\OfficeBuildingHousesService;

class OfficeBuildingHousesController extends Controller
{
    //房源详情
    public function show
    (
        OfficeBuildingHouse $officeBuildingHouse,
        OfficeBuildingHousesService $service
    )
    {
        $res = $service->getShow($officeBuildingHouse);
        return $res;
    }

    //房源详情下的相关房源
    public function showOffice
    (
        $id,
        OfficeBuildingHousesRepository $buildingHousesRepository,
        OfficeBuildingHousesService $service
    )
    {
        $res = $buildingHousesRepository->getShowOffice($service, $id);
        return $res;
    }

}
