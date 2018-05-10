<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\BuildingRecommendsRepository;

class BuildingRecommendsController extends APIBaseController
{
    /**
     * 说明: 楼盘推荐列表
     *
     * @param BuildingRecommendsRepository $buildingRecommendsRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function index
    (
        BuildingRecommendsRepository $buildingRecommendsRepository
    )
    {
        $res = $buildingRecommendsRepository->recommendList();
        return $this->sendResponse($res,'获取楼盘推荐列表');
    }
}