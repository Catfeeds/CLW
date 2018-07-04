<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\PcServiceRecommendsRequest;
use App\Models\PcServiceRecommend;
use App\Repositories\PcServiceRecommendsRepository;

class PcServiceRecommendsController extends APIBaseController
{
    // pc端推荐服务列表
    public function index
    (
        PcServiceRecommendsRepository $PcServiceRecommendRepository
    )
    {
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
        $result = $repository->addPcServiceRecommend($request);
        return $this->sendResponse($result, '添加成功');
    }

    // 修改pc端推荐服务
    public function update
    (
        PcServiceRecommendsRepository $PcServiceRecommendRepository,
        PcServiceRecommendsRequest $request,
        PcServiceRecommend $PcServiceRecommend
    )
    {
        $res = $PcServiceRecommendRepository->updatePcServiceRecommend($request,$PcServiceRecommend);
        return $this->sendResponse($res,'修改成功');
    }

    // 删除pc端推荐服务
    public function destroy(
        PcServiceRecommend $PcServiceRecommend
    )
    {
        $res = $PcServiceRecommend->delete();
        return $this->sendResponse($res,'删除成功');
    }
}
