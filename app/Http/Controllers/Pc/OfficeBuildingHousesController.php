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
        OfficeBuildingHousesRepository $buildingHousesRepository,
        OfficeBuildingHouse $officeBuildingHouse,
        OfficeBuildingHousesService $service
    )
    {
        $house = $service->getShow($officeBuildingHouse);
        $rimHouse = $buildingHousesRepository->getShowOffice($service, $officeBuildingHouse->id)->take(4);
        return view('home.house_detail', ['house' => $house, 'rimHouse' => $rimHouse]);
    }

}
