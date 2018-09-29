<?php

namespace App\Http\Controllers\API\Admin;

use App\Handler\Common;
use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\WorkOrdersRequest;
use App\Models\WorkOrder;
use App\Repositories\WorkOrdersRepository;
use App\Services\WorkOrdersService;

class WorkOrderController extends APIBaseController
{
    // 工单列表 (页面)
    public function index
    (
        WorkOrdersRepository $repository,
        WorkOrdersRequest $request
    )
    {
        $res= $repository->getList($request);
        return $this->sendResponse($res,'工单列表获取成功');
    }

    // 手机端工单列表
    public function mobileList
    (
        WorkOrdersRepository $repository,
        WorkOrdersRequest $request
    )
    {
        $res = $repository->mobileList($request);
        return $this->sendResponse($res, '列表获取成功');
    }

    // 工单详情 (页面)
    public function show
    (
        WorkOrdersRepository $repository,
        WorkOrder $workOrder
    )
    {
        $res = $repository->getShow($workOrder);
        return $this->sendResponse($res,'详情获取成功');
    }

    // 手机端工单详情
    public function mobileShow
    (
        WorkOrdersRepository $repository,
        WorkOrder $workOrder,
        WorkOrdersRequest $request
    )
    {
        $res = $repository->mobileShow($workOrder, $request);
        return $this->sendResponse($res,'详情获取成功');
    }


    // 投放委托 生成工单
    public function store
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        $res = $repository->addWorkOrder($request);
        if (!$res) return $this->sendError('添加失败');
        return $this->sendResponse($res, '添加成功');
    }

    // 客服下发工单
    public function issue
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        $res = $repository->issue($request);
        // TODO 发送微信消息
        if (!$res) return $this->sendError('工单分配失败');
        return $this->sendResponse($res, '工单分配成功');
    }

    // 重新分配工单
    public function reset
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        $res = $repository->reset($request);
        // TODO 发送微信消息
        if (!$res) return $this->sendError('工单分配失败');
        return $this->sendResponse($res, '工单分配成功');
    }

    // 管理层分配工单
    public function allocation
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        $res = $repository->allocation($request);
        // TODO 发送微信消息
        if (!$res) return $this->sendError('工单分配失败');
        return $this->sendResponse($res,'工单分配成功');
    }

    // 确认收到工单
    public function confirm
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        $res = $repository->confirm($request);
        if (!$res) return $this->sendError('确认收到工单失败');
        return $this->sendResponse($res,'确认收到工单成功');
    }

    // 有效工单
    public function valid
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        $res = $repository->valid($request);
        if (!$res) return $this->sendError('操作失败');
        return $this->sendResponse($res, '操作成功');
    }

    // 无效工单
    public function invalid
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        $res = $repository->invalid($request);
        if (!$res) return $this->sendError('操作失败');
        return $this->sendResponse($res, '操作成功');
    }

    // 跟进工单
    public function track
    (
        WorkOrdersRequest $request
    )
    {
        $res = Common::addSchedule($request->guid, $request->track);
        if (empty($res)) return $this->sendError('跟进失败');
        return $this->sendResponse($res, '跟进成功');
    }

    // 回转工单
    public function rotate
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        $res = $repository->rotate($request);
        // TODO 发送微信消息
        if (!$res) return $this->sendError('工单回转失败');
        return $this->sendResponse($res, '工单回转成功');
    }

    // 管理层获取下级
    public function getAgent
    (
        WorkOrdersRequest $request,
        WorkOrdersService $service
    )
    {
        $res = $service->getAgent($request->user_guid);
        return $this->sendResponse($res, '获取成功');
    }
}
