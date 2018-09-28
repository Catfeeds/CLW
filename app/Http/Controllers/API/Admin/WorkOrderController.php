<?php

namespace App\Http\Controllers\API\Admin;

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

        // 发送微信消息 TODO


        if (!$res) return $this->sendError('工单分配失败');
        return $this->sendResponse($res, '工单分配成功');

    }










}
