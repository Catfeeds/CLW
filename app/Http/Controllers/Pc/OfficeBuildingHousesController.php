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
        //房源所属楼盘
        $building = $house->buildingBlock->building;
        $data[0]['id'] = $block->area_id;
        $data[0]['name'] = $block->area->name;
        $data[1]['id'] = $block->id;
        $data[1]['name'] = $block->name;
        $data[2]['id'] = $building->id;
        $data[2]['name'] = $building->name;
        $data[3]['id'] = $building->id;
        $data[3]['name'] = $building->name;
        
        return view('home.house_detail', [
            'house' => $house,
            'rimHouse' => $rimHouse,
            'agentInfo' => $agentInfo,
            'data' => $data
        ]);
    }

}
