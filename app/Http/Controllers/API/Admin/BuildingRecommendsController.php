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
     *
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
        return $this->sendResponse($res,'写字楼推荐列表');
    }

    /**
     * 说明: 添加
     *
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
     * 说明: 获取修改推荐楼盘原生数据
     *
     * @param BuildingRecommend $buildingRecommend
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function edit(
        BuildingRecommend $buildingRecommend
    )
    {
        return $this->sendResponse($buildingRecommend,'获取修改推荐楼盘原生数据成功');
    }

    /**
     * 说明: 修改
     *
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
        // 检测商圈是否重复
        if (!empty($request->building_id) && $request->building_id != $buildingRecommend->building_id && in_array($request->building_id, BuildingRecommend::pluck('building_id')->toArray())) {
            return $this->sendError('楼盘不能重复添加为推荐');
        }

        $res = $BuildingRecommendsRepository->updateRecommend($request, $buildingRecommend);
        return $this->sendResponse($res,'修改推荐楼盘信息成功');
    }

    /**
     * 说明: 删除
     *
     * @param BuildingRecommend $buildingRecommend
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 王成
     */
    public function destroy(BuildingRecommend $buildingRecommend)
    {
        $res = $buildingRecommend->delete();
        return $this->sendResponse($res,'删除推荐楼盘成功');
    }
}

