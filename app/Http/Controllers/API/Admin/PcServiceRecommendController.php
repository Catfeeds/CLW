<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Controllers\Traits\SafeString;
use App\Http\Requests\Admin\PcServiceRecommendRequest;
use App\Models\PcServiceRecommend;
use App\Repositories\PcServiceRecommendRepository;


class PcServiceRecommendController extends APIBaseController
{
    use SafeString;

    /**
     * 说明: 获取列表
     *
     * @param PcServiceRecommendRepository $PcServiceRecommendRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 郑宇
     */
    public function index
    (
        PcServiceRecommendRepository $PcServiceRecommendRepository
    )
    {
        $res = $PcServiceRecommendRepository->PcServiceRecommendList();
        return $this->sendResponse($res,'PcServiceRecommend列表获取成功');
    }

    /**
     * 说明: 添加
     *
     * @param PcServiceRecommendRepository $PcServiceRecommendRepository
     * @param PcServiceRecommendRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @author 郑宇
     */
    public function store
    (
        PcServiceRecommendRepository $PcServiceRecommendRepository,
        PcServiceRecommendRequest $request
    )
    {
        $res = PcServiceRecommend::all()->toArray();
        if (!empty($res)) {
            return $this->sendError('无法重复添加','405');
        } else {
            $result = $bannerRepository->addPcServiceRecommend($request);
            return $this->sendResponse($result, '添加banner成功');
        }
    }

    /**
     * 说明: 修改
     *
     * @param PcServiceRecommendRepository $PcServiceRecommendRepository
     * @param PcServiceRecommendRequest $request
     * @param PcServiceRecommend $PcServiceRecommend
     * @return \Illuminate\Http\JsonResponse
     * @author 郑宇
     */
    public function update
    (
        PcServiceRecommendRepository $PcServiceRecommendRepository,
        PcServiceRecommendRequest $request,
        PcServiceRecommend $PcServiceRecommend
    )
    {
        $res = $PcServiceRecommendRepository->updatePcServiceRecommend($request,$PcServiceRecommend);
        return $this->sendResponse($res,'修改成功');
    }

    /**
     * 说明: 删除
     *
     * @param PcServiceRecommend $PcServiceRecommend
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 郑宇
     */
    public function destroy(PcServiceRecommend $PcServiceRecommend)
    {
        $res = $PcServiceRecommend->delete();
        return $this->sendResponse($res,'删除成功');
    }
}
