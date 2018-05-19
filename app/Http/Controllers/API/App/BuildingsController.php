<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Models\Building;
use App\Repositories\BuildingsRepository;
use Illuminate\Http\Request;

class BuildingsController extends APIBaseController
{
    /**
     * 说明: 首页楼盘分页列表
     *
     * @param BuildingsRepository $buildingsRepository
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function index
    (
        BuildingsRepository $buildingsRepository,
        Request $request
    )
    {
        $res = $buildingsRepository->buildingList($request);
        return $this->sendResponse($res,'显示楼盘分页列表');
    }

    /**
     * 说明: 获取楼盘详情
     *
     * @param Building $building
     * @param BuildingsRepository $buildingsRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function show(
        Building $building,
        BuildingsRepository $buildingsRepository

    )
    {
        $res = $buildingsRepository->getShow($building);
        return $this->sendResponse($res,'获取楼盘详情');
    }

    /**
     * 说明: 楼盘下房源列表
     *
     * @param BuildingsRepository $buildingsRepository
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function showOffice
    (
        BuildingsRepository $buildingsRepository,
        $id
    )
    {
        $res = $buildingsRepository->OfficeHouseList($id);
        return $this->sendResponse($res,'获取楼盘下房源列表');
    }
}