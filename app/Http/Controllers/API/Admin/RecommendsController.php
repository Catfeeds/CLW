<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\RecommendsRequest;
use App\Models\Recommend;
use App\Repositories\RecommendsRepository;
use App\Services\RecommendsService;

class RecommendsController extends APIBaseController
{
    /**
     * 说明: 获取精品推荐类表
     *
     * @param RecommendsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index(
        RecommendsRepository $repository
    )
    {
        $res = $repository->recommendsList();
        return $this->sendResponse($res,'推荐列表获取成功');
    }

    /**
     * 说明: 添加精品推荐
     *
     * @param RecommendsRepository $repository
     * @param RecommendsRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function store
    (
        RecommendsRepository $repository,
        RecommendsRequest $request
    )
    {
        $res = $repository->addRecommends($request);
        return $this->sendResponse($res,'精品推荐添加成功');
    }

    /**
     * 说明: 修改精品推荐之前原始数据
     *
     * @param recommend $recommend
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function edit(Recommend $recommend)
    {
        return $this->sendResponse($recommend,'推荐修改之前原始数据');
    }

    /**
     * 说明: 修改精品推荐
     *
     * @param RecommendsRepository $repository
     * @param RecommendsRequest $request
     * @param recommend $recommend
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function update
    (
        RecommendsRepository $repository,
        RecommendsRequest $request,
        Recommend $recommend
    )
    {
        // 检测商圈是否重复
        if (!empty($request->title) && $request->title != $recommend->title && in_array($request->title, Recommend::pluck('title')->toArray())) {
            return $this->sendError('精品推荐标题不能重复');
        }

        // 检测商圈是否重复
        if (!empty($request->introduce) && $request->introduce != $recommend->introduce && in_array($request->introduce, Recommend::pluck('introduce')->toArray())) {
            return $this->sendError('精品推荐介绍不能重复');
        }

        $res = $repository->updateRecommend($recommend, $request);
        if (!$res) return $this->sendError('推荐修改失败');
        return $this->sendResponse($res, '推荐修改成功');
    }

    /**
     * 说明: 删除精品推荐
     *
     * @param recommend $recommend
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 刘坤涛
     */
    public function destroy(Recommend $recommend)
    {
        $res = $recommend->delete();
        return $this->sendResponse($res,'推荐删除成功');
    }

    /**
     * 说明: 添加或修改精品推荐时楼盘下拉数据
     *
     * @param RecommendsService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function buildingsSelect(RecommendsService $service)
    {
        $res = $service->buildingsSelect();
        return $this->sendResponse($res,'精品推荐时楼盘下拉数据获取成功');

    }
}
