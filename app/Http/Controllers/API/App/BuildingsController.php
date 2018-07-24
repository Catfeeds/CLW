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
        // 小程序处理面积
        if (!empty($request->acreage) && gettype($request->acreage) === 'string') {
            $request->offsetSet('acreage', explode(',',$request->acreage));
        }

        // 小程序处理总价
        if (!empty($request->total_price) && gettype($request->total_price) === 'string') {
            $request->offsetSet('total_price', explode(',',$request->total_price));
        }

        // 小程序处理单价
        if (!empty($request->unit_price) && gettype($request->unit_price) === 'string') {
            $request->offsetSet('unit_price', explode(',',$request->unit_price));
        }

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