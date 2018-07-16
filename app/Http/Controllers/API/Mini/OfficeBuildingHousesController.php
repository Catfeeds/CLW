<?php

namespace App\Http\Controllers\API\Mini;

use App\Http\Controllers\API\APIBaseController;
use App\Services\OfficeBuildingHousesService;
use Illuminate\Http\Request;

class OfficeBuildingHousesController extends APIBaseController
{
    public function getMiniHouse(
        Request $request,
        OfficeBuildingHousesService $service
    )
    {
        $res = $service->getMiniHouse($request);
        return response()->json(['StatusCode' => 200, 'ResultData' => $res]);
    }
}
