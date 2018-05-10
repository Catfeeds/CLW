<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\RecommendsRequest;
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
     * 说明: 点击精品推荐跳转楼盘列表
     *
     * @param RecommendsRepository $repository
     * @param RecommendsRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function create
    (
        RecommendsRepository $repository,
        RecommendsRequest $request
    )
    {
        $res = $repository->getBuildingList($request);
        return $this->sendResponse($res, '楼盘列表获取成功');
    }
}