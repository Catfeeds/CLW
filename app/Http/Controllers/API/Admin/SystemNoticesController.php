<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\SystemNoticesRequest;
use App\Models\SystemNotice;
use App\Repositories\SystemNoticesRepository;

class SystemNoticesController extends APIBaseController
{
    /**
     * 说明: 系统公告列表
     *
     * @param SystemNoticesRepository $systemNoticesRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function index(
        SystemNoticesRepository $systemNoticesRepository
    )
    {
        $result = $systemNoticesRepository->SystemNoticesList();
        return $this->sendResponse($result, '系统公告列表获取成功');
    }

    /**
     * 说明: 添加系统公告
     *
     * @param SystemNoticesRequest $request
     * @param SystemNoticesRepository $systemNoticesRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        SystemNoticesRequest $request,
        SystemNoticesRepository $systemNoticesRepository
    )
    {
        $result = $systemNoticesRepository->addSystemNotices($request);
        return $this->sendResponse($result, '系统公告添加成功');
    }

    /**
     * 说明: 获取修改前系统公告原始数据
     *
     * @param SystemNotice $systemNotice
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function edit(
        SystemNotice $systemNotice
    )
    {
        return $this->sendResponse($systemNotice, '获取修改前系统公告原始数据成功');
    }

    /**
     * 说明: 修改系统公告
     *
     * @param SystemNotice $systemNotice
     * @param SystemNoticesRequest $request
     * @param SystemNoticesRepository $systemNoticesRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function update(
        SystemNotice $systemNotice,
        SystemNoticesRequest $request,
        SystemNoticesRepository $systemNoticesRepository
    )
    {
        $result = $systemNoticesRepository->updateSystemNotices($request, $systemNotice);
        return $this->sendResponse($result, '系统公告修改成功');
    }

    /**
     * 说明: 删除系统公告
     *
     * @param SystemNotice $systemNotice
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 罗振
     */
    public function destroy(
        SystemNotice $systemNotice
    )
    {
        $result = $systemNotice->delete();
        return $this->sendResponse($result, '系统公告删除成功');
    }

}