<?php

namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Repositories\BuildingRecommendsRepository;
use App\Services\BuildingsService;

class BuildingRecommendController extends Controller
{
    /**
     * 说明: 楼盘推荐列表
     *
     * @param BuildingRecommendsRepository $buildingRecommendsRepository
     * @param BuildingsService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index
    (
        BuildingRecommendsRepository $buildingRecommendsRepository,
        BuildingsService $service
    )
    {
        $res = $buildingRecommendsRepository->recommendList($service);
        return view('we.recommed')->with('data', $res);
    }
}