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
        $agentInfo = $buildingHousesRepository->getAgentInfo($officeBuildingHouse);
        $rimHouse = $buildingHousesRepository->getShowOffice($service, $officeBuildingHouse->id)->take(4);
        //房源所属商圈
        $block = $house->buildingBlock->building->block;
        $data[$block->area_id] = $block->area->name;
        $data[$block->id] = $block->name;
        //房源所属楼盘
        $building = $house->buildingBlock->building;
        $data[$building->id] = $building->name;
        return view('home.house_detail', [
            'house' => $house,
            'rimHouse' => $rimHouse,
            'agentInfo' => $agentInfo,
            'data' => $data
        ]);
    }

}
