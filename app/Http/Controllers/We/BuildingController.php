<?php

namespace App\Http\Controllers\We;

use App\Models\Building;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BuildingController extends Controller
{
    /**
     * 说明: 楼盘列表 试图
     *
     * @param BuildingsRepository $buildingsRepository
     * @param Request $request
     * @param BuildingsService $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 刘坤涛
     */
    public function index
    (
        BuildingsRepository $buildingsRepository,
        Request $request,
        BuildingsService $service
    )
    {
        if (!empty($request->condition)) {
            foreach (json_decode($request->condition) as $key => $item) {
                $request->$key = $item;
            }
        }
        $res = $buildingsRepository->buildingList($request, $service);
        return view('we.building_index')->with(['data' =>  $res, 'req' => $request]);
    }

    /**
     * 说明: 楼盘列表数据
     *
     * @param BuildingsRepository $buildingsRepository
     * @param Request $request
     * @param BuildingsService $service
     * @return mixed
     * @author 刘坤涛
     */
    public function create
    (
        BuildingsRepository $buildingsRepository,
        Request $request,
        BuildingsService $service
    )
    {
        if (!empty($request->condition)) {
            foreach (json_decode($request->condition) as $key => $item) {
                $request->$key = $item;
            }
        }
        $res = $buildingsRepository->buildingList($request, $service);
        return $res;
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
        if (!empty($building->company)) $building->company_cn = implode(',', $building->company);
        return view('we.building_detail')->with('data', $res);
    }
}
