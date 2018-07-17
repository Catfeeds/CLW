<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\SystemNoticesRequest;
use App\Models\SystemNotice;
use App\Repositories\SystemNoticesRepository;
use APP\Handler\Common;

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
        if (empty(Common::user()->can('system_notices_list'))) {
            return $this->sendError('无system_notices_list权限','403');
        }
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
        if (empty(Common::user()->can('add_system_notices'))) {
            return $this->sendError('无add_system_notices权限','403');
        }
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
        if (empty(Common::user()->can('update_system_notices'))) {
            return $this->sendError('无update_system_notices权限','403');
        }
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
        if (empty(Common::user()->can('del_system_notices'))) {
            return $this->sendError('无del_system_notices权限','403');
        }
        $result = $systemNotice->delete();
        return $this->sendResponse($result, '系统公告删除成功');
    }

}