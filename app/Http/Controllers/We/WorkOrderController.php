<?php

namespace App\Http\Controllers\We;

use App\Http\Requests\Admin\WorkOrdersRequest;
use App\Models\WorkOrder;
use App\Repositories\WorkOrdersRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class WorkOrderController extends Controller
{
    // 手机工单列表
    public function index(WorkOrdersRequest $request)
    {
        $string = 'chulouwang'.date('Y-m-d',time());
        $string = Hash::make($string);
        if (!$request->user_guid) {
            return '缺少参数';
        }
        return view('we.work_order_list', ['safeString' => $string, 'user_guid' => $request->user_guid]);
    }

    // 工单详情
    public function show
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository,
        WorkOrder $workOrder
    )
    {
        $string = 'chulouwang'.date('Y-m-d',time());
        $string = Hash::make($string);
        // 经纪人guid
        if ($request->user_guid && !$request->openid) {
            $user_guid = $request->user_guid;
        } elseif (!$request->user_guid && $request->openid) {
            $user_guid = $repository->getUserGuid($request->openid);
            if (empty($user_guid)) {
                return '参数错误';
            }
        } else {
            return '缺少参数';
        }
        $res = $repository->getShow($workOrder, $user_guid);
        // 经纪人称谓
        $appellation = $repository->getUser($user_guid);
        $appellation = trim($appellation, ' ()');
        // dd($appellation);
        return view('we.work_order_detail', ['res' => $res, 'safeString' => $string, 'user_guid' => $user_guid, 'appellation' => $appellation]);
    }

    // 添加工单
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
}
