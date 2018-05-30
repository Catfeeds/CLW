<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Models\Building;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use App\Services\OfficeBuildingHousesService;
use Illuminate\Http\Request;

class BuildingsController extends APIBaseController
{
    /**
     * 说明: 首页楼盘分页列表
     *
     * @param BuildingsRepository $buildingsRepository
     * @param Request $request
     * @param BuildingsService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function index
    (
        BuildingsRepository $buildingsRepository,
        Request $request,
        BuildingsService $service
    )
    {
        $res = $buildingsRepository->buildingList($request, $service);
        return $this->sendResponse($res,'显示楼盘分页列表');
    }

    /**
     * 说明: 获取楼盘详情
     *
     * @param Building $building
     * @param BuildingsRepository $buildingsRepository
     * @param BuildingsService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function show(
        Building $building,
        BuildingsRepository $buildingsRepository,
        BuildingsService $service

    )
    {
        $res = $buildingsRepository->getShow($building, $service);
        return $this->sendResponse($res,'获取楼盘详情');
    }

    /**
     * 说明: 楼盘下房源列表
     *
     * @param BuildingsRepository $buildingsRepository
     * @param OfficeBuildingHousesService $service
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function showOffice
    (
        BuildingsRepository $buildingsRepository,
        OfficeBuildingHousesService $service,
        $id
    )
    {
        $res = $buildingsRepository->OfficeHouseList($service, $id);
        return $this->sendResponse($res,'获取楼盘下房源列表');
    }
}