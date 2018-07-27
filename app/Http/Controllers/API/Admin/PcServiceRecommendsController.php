<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\PcServiceRecommendsRequest;
use App\Models\PcServiceRecommend;
use App\Repositories\PcServiceRecommendsRepository;
use App\Handler\Common;

class PcServiceRecommendsController extends APIBaseController
{
    // pc端推荐服务列表
    public function index
    (
        PcServiceRecommendsRepository $PcServiceRecommendRepository
    )
    {
        if (empty(Common::user()->can('Pc_service_recommend_list'))) {
            return $this->sendError('无pc端推荐服务列表权限','403');
        }
        $res = $PcServiceRecommendRepository->PcServiceRecommendList();
        return $this->sendResponse($res,'列表获取成功');
    }

    // 添加pc端推荐服务
    public function store
    (
        PcServiceRecommendsRepository $repository,
        PcServiceRecommendsRequest $request
    )
    {
        if (empty(Common::user()->can('add_pc_service_recommend'))) {
            return $this->sendError('无添加pc端推荐服务权限','403');
        }
        $result = $repository->addPcServiceRecommend($request);
        return $this->sendResponse($result, '添加成功');
    }

    // 获取修改原始数据
    public function edit(
        PcServiceRecommend $PcServiceRecommend
    )
    {
        return $this->sendResponse($PcServiceRecommend,'获取修改原始数据成功');
    }

    // 修改pc端推荐服务
    public function update
    (
        PcServiceRecommendsRepository $PcServiceRecommendRepository,
        PcServiceRecommendsRequest $request,
        PcServiceRecommend $PcServiceRecommend
    )
    {
        if (empty(Common::user()->can('update_pc_service_recommend'))) {
            return $this->sendError('无修改pc端推荐服务权限','403');
        }
        $res = $PcServiceRecommendRepository->updatePcServiceRecommend($request,$PcServiceRecommend);
        return $this->sendResponse($res,'修改成功');
    }

    // 删除pc端推荐服务
    public function destroy(
        PcServiceRecommend $PcServiceRecommend
    )
    {
        if (empty(Common::user()->can('del_pc_service_recommend'))) {
            return $this->sendError('无删除pc端推荐服务权限','403');
        }
        $res = $PcServiceRecommend->delete();
        return $this->sendResponse($res,'删除成功');
    }
}
