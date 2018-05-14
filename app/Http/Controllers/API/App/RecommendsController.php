<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Models\Recommend;
use App\Repositories\RecommendsRepository;

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

    /**
     * 说明：首页点击精品推荐跳转到楼盘列表
     *
     * @param RecommendsRepository $repository
     * @param Recommend $recommend
     * @return \Illuminate\Http\JsonResponse
     * @author jacklin
     */
    public function show
    (
        RecommendsRepository $repository,
        Recommend $recommend
    )
    {
        $res = $repository->getBuildingList($recommend->building_id);
        return $this->sendResponse($res, '楼盘列表获取成功');
    }
}