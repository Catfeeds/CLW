<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\BuildingRecommendsRequest;
use App\Models\BuildingRecommend;
use App\Repositories\BuildingRecommendsRepository;

class BuildingRecommendsController extends APIBaseController
{
    /**
     * 说明:  获取列表
     * @param BuildingRecommendsRepository $BuildingRecommendsRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function index
    (
        BuildingRecommendsRepository $BuildingRecommendsRepository
    )
    {
        $res = $BuildingRecommendsRepository->recommendList();
        return $this->sendResponse($res,'列表');
    }

    /**
     * 说明: 添加
     * @param BuildingRecommendsRepository $BuildingRecommendsRepository
     * @param BuildingRecommendsRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function store
    (
        BuildingRecommendsRepository $BuildingRecommendsRepository,
        BuildingRecommendsRequest $request
    )
    {
        $res = $BuildingRecommendsRepository->addRecommend($request);
        return $this->sendResponse($res, '添加成功');
    }

    /**
     * 说明: 修改之前原始数据
     * @param BuildingRecommend $buildingRecommend
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function edit(BuildingRecommend $buildingRecommend)
    {
        return $this->sendResponse($buildingRecommend,'修改之前原始数据获取成功');
    }

    /**
     * 说明: 修改
     * @param BuildingRecommendsRepository $BuildingRecommendsRepository
     * @param BuildingRecommendsRequest $request
     * @param BuildingRecommend $buildingRecommend
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function update
    (
        BuildingRecommendsRepository $BuildingRecommendsRepository,
        BuildingRecommendsRequest $request,
        BuildingRecommend $buildingRecommend
    )
    {
        $res = $BuildingRecommendsRepository->updateRecommend($request,$buildingRecommend);
        return $this->sendResponse($res,'banner修改成功');
    }

    /**
     * 说明: 删除
     * @param BuildingRecommend $buildingRecommend
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 王成
     */
    public function destroy(BuildingRecommend $buildingRecommend)
    {
        $res = $buildingRecommend->delete();
        return $this->sendResponse($res,'图片删除成功');
    }
}

