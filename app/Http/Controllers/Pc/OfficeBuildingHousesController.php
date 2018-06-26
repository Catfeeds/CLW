<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Models\OfficeBuildingHouse;
use App\Services\OfficeBuildingHousesService;

class OfficeBuildingHousesController extends Controller
{
    public function show
    (
        OfficeBuildingHouse $officeBuildingHouse,
        OfficeBuildingHousesService $service
    )
    {
        dd($officeBuildingHouse);
        $res = $service->getShow($officeBuildingHouse);
        return $res;
    }
}
