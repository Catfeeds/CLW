<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\WorkOrdersRequest;
use App\Repositories\WorkOrdersRepository;
use App\Services\HousesService;
use App\Services\WorkOrdersService;

class WorkOrderController extends APIBaseController
{
    public function index
    (
        WorkOrdersService $service,
        WorkOrdersRepository $repository,
        WorkOrdersRequest $request
    )
    {
        $res= $repository->getList($request, $service);
        return $this->sendResponse($res,'工单列表获取成功');
    }

    // 添加工单
    public function store
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository,
        HousesService $service,
        WorkOrdersService $workOrdersService
    )
    {
        $res = $repository->addWorkOrder($request, $service);
        // 店长guid、微信id存在、工单添加成功, 则发送消息
        if ($request->shopkeeper_guid && $request->openid && $res) {
            $suc = $workOrdersService->send($request->openid, $res->name, $res->tel);
            if (!$suc->success) return $this->sendError('微信消息发送失败');
        }
        if (!$res) return $this->sendError('工单添加失败');
        return $this->sendResponse($res, '工单添加成功');
    }

    // 手机页面  获取店长下面的业务员
    public function getStaff
    (
        WorkOrdersService $service,
        WorkOrdersRequest $request
    )
    {
        // 通过openid 获取用户guid
        $guid = $service->getGuid($request->openid);
        // 获取店长下面的业务员
        $res = $service->getStaff($guid);
        return $this->sendResponse($res, '业务员信息获取成功');
    }
}
