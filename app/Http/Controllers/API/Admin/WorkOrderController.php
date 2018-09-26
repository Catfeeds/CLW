<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\WorkOrdersRequest;
use App\Models\WorkOrder;
use App\Repositories\WorkOrdersRepository;
use App\Services\WorkOrdersService;

class WorkOrderController extends APIBaseController
{
    // 工单列表
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
        WorkOrdersService $service
    )
    {
        $res = $repository->addWorkOrder($request);
        // 店长guid、微信id存在、工单添加成功, 则发送消息
        $openid = $service->getOpenid($request->shopkeeper_guid);
        if ($request->shopkeeper_guid && $openid && $res) {
            $suc = $service->send($openid, $res->name, $res->tel);
            if (!$suc->success) \Log::info('微信消息发送失败');
        }
        if (!$res) return $this->sendError('工单添加失败');
        return $this->sendResponse($res, '工单添加成功');
    }

    // 编辑工单
    public function edit(WorkOrder $workOrder)
    {
        return $this->sendResponse($workOrder, '工单修改之前原始数据');
    }

    // 修改工单
    public function update
    (
        WorkOrder $workOrder,
        WorkOrdersRepository $repository,
        WorkOrdersRequest $request
    )
    {
        $res = $repository->updateWorkOrder($workOrder, $request);
        if (!$res) return $this->sendError('修改失败');
        return $this->sendResponse($res, '修改成功');
    }

    // 添加工单获取所有店长以上级别
    public function getShopkeeper(WorkOrdersService $service)
    {
        $res = $service->getShopkeeper();
        return $this->sendResponse($res, '获取成功');
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

    // 店长分配工单
    public function distribution
    (
       WorkOrdersRepository $repository,
       WorkOrdersRequest $request,
       WorkOrdersService $service
    )
    {
        $res = $repository->distribution($request);
        //获取该记录的客户名称和电话
        $item = WorkOrder::where('guid', $request->guid)->first();
        if ($res) $service->send($request->openid,$item->name,$item->tel,true);
        return $this->sendResponse($res, '工单分配成功');
    }

    // 店员确定工单
    public function determine
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        $res = $repository->determine($request);
        return $this->sendResponse($res, '工单确认成功');
    }

    // 员工反馈工单信息
    public function feedback
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        $res = $repository->feedback($request);
        return $this->sendResponse($res, '信息反馈成功');
    }

    // 手机端店长处理工单界面
    public function shopkeeperList
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository,
        WorkOrdersService $service
    )
    {
        $res = $repository->shopkeeperList($request, $service);
        return $this->sendResponse($res, '店长处理页面获取成功');
    }

    // 业务员处理页面
    public function staffList
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository,
        WorkOrdersService $service
    )
    {
        $res = $repository->staffList($request, $service);
        return $this->sendResponse($res, '业务员处理页面获取成功');
    }

}
