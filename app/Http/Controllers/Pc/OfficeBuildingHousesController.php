<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Models\Houses;
use App\Repositories\OfficeBuildingHousesRepository;
use App\Services\OfficeBuildingHousesService;

class OfficeBuildingHousesController extends Controller
{
    //房源详情
    public function show
    (
        $id,
        OfficeBuildingHousesRepository $buildingHousesRepository,
        OfficeBuildingHousesService $service
    )
    {
        $house = Houses::find($id);
        $house = $service->getShow($house);
        $agentInfo = $buildingHousesRepository->getAgentInfo($house);
        $rimHouse = $buildingHousesRepository->getShowOffice($service, $id)->take(4);
        //房源所属商圈
        $block = $house->buildingBlock->building->block;
        //房源所属楼盘
        $building = $house->buildingBlock->building;
        // 商圈经纪人信息
        $relBlock = $block->relBlock;
        $data[0]['guid'] = $block->area_guid;
        $data[0]['name'] = $block->area->name;
        $data[1]['guid'] = $block->guid;
        $data[1]['name'] = $block->name;
        $data[2]['guid'] = $building->guid;
        $data[2]['name'] = $building->name;
        $data[3]['guid'] = $building->guid;
        $data[3]['name'] = $building->name;
        
        return view('home.house_detail', [
            'house' => $house,
            'rimHouse' => $rimHouse,
            'agentInfo' => $agentInfo,
            'data' => $data,
            'relBlock' => $relBlock
        ]);
    }

}
