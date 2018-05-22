<?php

namespace App\Http\Controllers\We;

use App\Http\Requests\Admin\BuildingsRequest;
use App\Models\Building;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use App\Http\Controllers\Controller;

class BuildingController extends Controller
{
    public function index()
    {
        return view('we.building_list');
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
