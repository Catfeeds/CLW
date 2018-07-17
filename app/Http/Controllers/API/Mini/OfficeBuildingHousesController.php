<?php

namespace App\Http\Controllers\API\Mini;

use App\Http\Controllers\API\APIBaseController;
use App\Services\OfficeBuildingHousesService;
use Illuminate\Http\Request;

class OfficeBuildingHousesController extends APIBaseController
{
    // 房源一站通房源
    public function getMiniHouse(
        Request $request,
        OfficeBuildingHousesService $service
    )
    {
        $res = $service->getMiniHouse($request);
        return response()->json(['StatusCode' => 200, 'ResultData' => $res]);
    }

    public function getMiniHouseInfo(
        Request $request,
        OfficeBuildingHousesService $service
    )
    {
        $res = $service->getMiniHouseInfo($request);
        return response()->json($res);
    }
}
