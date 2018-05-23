<?php

namespace App\Http\Controllers\We;

use App\Models\Building;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BuildingController extends Controller
{
    public function index
    (
        BuildingsRepository $buildingsRepository,
        Request $request,
        BuildingsService $service
    )
    {
        $res = $buildingsRepository->buildingList($request, $service);
        return view('we.building_index')->with('data', $res);
    }

    // 楼盘详情
    public function show
    (
        Building $building,
        BuildingsRepository $buildingsRepository,
        BuildingsService $service
    )

    {
        $res = $buildingsRepository->getShow($building, $service);
        return view('we.building_detail')->with('data', $res);
    }
}
