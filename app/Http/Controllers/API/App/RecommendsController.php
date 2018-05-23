<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Models\Recommend;
use App\Repositories\BuildingsRepository;
use App\Repositories\RecommendsRepository;
use App\Services\BuildingsService;
use Illuminate\Http\Request;

class RecommendsController extends APIBaseController
{
    /**
     * 说明: 获取精品推荐列表
     *
     * @param RecommendsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function index
    (
        RecommendsRepository $repository
    )
    {
        $res = $repository->recommendsList();
        return $this->sendResponse($res,'精品推荐列表获取成功');
    }


//    /**
//     * 说明：首页点击精品推荐跳转到楼盘列表
//     *
//     * @param RecommendsRepository $repository
//     * @param Recommend $recommend
//     * @return \Illuminate\Http\JsonResponse
//     * @author jacklin
//     */
//    public function show
//    (
//        BuildingsRepository $repository,
//        Recommend $recommend,
//        BuildingsService $service,
//        Request $request
//    )
//    {
//        dd(123);
//        $res = $repository->getBuildingList($recommend->building_id, $service, $request);
//        return $this->sendResponse($res, '楼盘列表获取成功');
//    }

    /**
     * 说明: 首页点击精品推荐跳转到楼盘列表
     *
     * @param RecommendsRepository $repository
     * @param Recommend $recommend
     * @param BuildingsService $service
     * @return \Illuminate\Http\JsonResponse
     * @author jacklin
     */
    public function show
    (
        RecommendsRepository $repository,
        Recommend $recommend,
        BuildingsService $service
    )
    {
        $res = $repository->getBuildingList($recommend->building_id, $service);
        return $this->sendResponse($res, '楼盘列表获取成功');
    }

}