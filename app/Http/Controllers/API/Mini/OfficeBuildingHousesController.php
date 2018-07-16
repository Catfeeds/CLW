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
        return $this->sendResponse($res,'获取房源一站通数据成功');
    }
}
