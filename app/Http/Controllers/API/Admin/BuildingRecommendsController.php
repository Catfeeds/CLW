<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\BuildingRecommendsRequest;
use App\Models\BuildingRecommend;
use App\Repositories\BuildingRecommendsRepository;
use App\Services\BuildingsService;
use APP\Handler\Common;

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
        BuildingRecommendsRepository $BuildingRecommendsRepository,
        BuildingsService $service
    )
    {
        if (empty(Common::user()->can('buildings_recommend_list'))) {
            return $this->sendError('无写字楼推荐列表权限','403');
        }
        $res = $BuildingRecommendsRepository->recommendList($service);
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
        if (empty(Common::user()->can('add_building_recommend'))) {
            return $this->sendError('无写字楼推荐添加权限','403');
        }
        $res = $BuildingRecommendsRepository->addRecommend($request);
        return $this->sendResponse($res, '添加成功');
    }

    /**
     * 说明：获取修改推荐楼盘原生数据
     *
     * @param BuildingRecommend $buildingRecommend
     * @param BuildingsService $service
     * @return \Illuminate\Http\JsonResponse
     * @author jacklin
     */
    public function edit(
        BuildingRecommend $buildingRecommend,
        BuildingsService $service
    )
    {
        $service->getArrId($buildingRecommend);
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
        if (empty(Common::user()->can('update_building_recommend'))) {
            return $this->sendError('无写字楼推荐修改权限','403');
        }
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
        if (empty(Common::user()->can('del_building_recommend'))) {
            return $this->sendError('无写字楼推荐删除权限','403');
        }
        $res = $buildingRecommend->delete();
        return $this->sendResponse($res,'删除推荐楼盘成功');
    }
}

