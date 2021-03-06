<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\WorkOrdersRequest;
use App\Models\WorkOrder;
use App\Repositories\WorkOrdersRepository;
use App\Services\DingTalkService;
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
        WorkOrder $workOrder,
        WorkOrdersRequest $request
    )
    {
        $res = $repository->getShow($workOrder, $request);
        return $this->sendResponse($res,'详情获取成功');
    }

    // 新建工单
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
        WorkOrdersRepository $repository,
        WorkOrdersService $service
    )
    {
        $res = $repository->issue($request);
        $openid = $service->getOpenid($res->manage_guid);
        // 如果openid存在 发送消息 并且更新成功
        if ($openid && $res) {
            $service->send($openid, $res->gd_identifier, $res->demand_cn, $res->remark, $res->created_at->format('Y-m-d H:i:s'), $res->guid);
        }
        if (!$res) return $this->sendError('工单分配失败');
        return $this->sendResponse($res, '工单分配成功');
    }

    // 重新分配工单
    public function reset
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository,
        WorkOrdersService $service
    )
    {
        $res = $repository->reset($request);
        $openid = $service->getOpenid($res->manage_guid);
        // 如果openid存在 发送消息 并且更新成功
        if ($openid && $res) {
            $service->send($openid, $res->gd_identifier, $res->demand_cn, $res->remark, $res->created_at->format('Y-m-d H:i:s'), $res->guid);
        }
        if (!$res) return $this->sendError('工单分配失败');
        return $this->sendResponse($res, '工单分配成功');
    }

    // 管理层分配工单
    public function allocation
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository,
        WorkOrdersService $service
    )
    {
        $res = $repository->allocation($request);
        $openid = $service->getOpenid($res->handle_guid);
        // 如果openid存在 发送消息 并且更新成功
        if ($openid && $res) {
            $service->send($openid, $res->gd_identifier, $res->demand_cn, $res->remark, $res->created_at->format('Y-m-d H:i:s'), $res->guid);
        }
        if (!$res) return $this->sendError('工单分配失败');
        return $this->sendResponse($res,'工单分配成功');
    }

    // 管理层获取下级
    public function getAgent(WorkOrdersRequest $request)
    {
        $res = curl(config('setting.saas_url').'/api/company/get_agent?user_guid='.$request->user_guid, 'get');
        if ($res) {
            return $this->sendResponse($res->data, '获取成功');
        }
        return $this->sendError('获取失败');
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
        $identifier = curl(config('setting.saas_url').'/api/company/get_identifier?demand='.$request->demand.'&identifier='.$request->identifier, 'get');
        if (!$identifier->success) {
            return $this->sendError($identifier->message);
        }
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
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        $res = $repository->addTrack($request);
        return $this->sendResponse($res, '跟进成功');
    }

    // 回转工单
    public function rotate
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository,
        WorkOrdersService $service
    )
    {
        $res = $repository->rotate($request);
        $openid = $service->getOpenid($res->manage_guid);
        // 如果openid存在 发送消息 并且更新成功
        if ($openid && $res) {
            $service->send($openid, $res->gd_identifier, $res->demand_cn, $res->remark, $res->created_at->format('Y-m-d H:i:s'), $res->guid, "工单回转提醒");
        }
        if (!$res) return $this->sendError('工单回转失败');
        return $this->sendResponse($res, '工单回转成功');
    }

    // 工单修改之前原始数据
    public function edit(WorkOrder $workOrder)
    {
        return $this->sendResponse($workOrder,'工单修改之前原始数据获取成功');
    }

    // 修改工单
    public function update
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository,
        WorkOrder $workOrder
    )
    {
        $res = $repository->updateWorkOrder($request,$workOrder);
        return $this->sendResponse($res,'工单修改成功');
    }
}
