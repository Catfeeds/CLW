<?php

namespace App\Http\Controllers\We;

use App\Models\OfficeBuildingHouse;
use App\Repositories\OfficeBuildingHousesRepository;
use App\Services\OfficeBuildingHousesService;
use App\Http\Controllers\Controller;

class HouseController extends Controller
{
    // 房源详情以及相关房源
    public function show
    (
        $id,
        OfficeBuildingHousesService $service,
        OfficeBuildingHousesRepository $repository
    )
    {
        $officeBuildingHouse = OfficeBuildingHouse::findOrFail($id);
        // 房源数据
        $house = $service->getShow($officeBuildingHouse);
        // 相关房源
        $relHouse = $repository->getShowOffice($service, $id);
        return view('we.house_detail')->with(['house' => $house, 'relHouse' => $relHouse]);
    }


}
