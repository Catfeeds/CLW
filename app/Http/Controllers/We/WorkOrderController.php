<?php

namespace App\Http\Controllers\We;

use App\Http\Requests\Admin\WorkOrdersRequest;
use App\Models\WorkOrder;
use App\Repositories\WorkOrdersRepository;
use App\Services\WorkOrdersService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class WorkOrderController extends Controller
{
    // 投放委托
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

    public function show
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository,
        WorkOrder $workOrder
    )
    {
        $string = 'chulouwang'.date('Y-m-d',time());
        // 经纪人guid
        $user_guid = $repository->getUserGuid($request->openid);
        $res = $repository->getShow($workOrder, $user_guid);
        dd($res);
        return view('we.work_order_detail', ['res' => $res, 'safeString' => $string]);
    }
    

    /**
     * 说明: 业务员 工单处理页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function salesman(Request $request)
    {
        $string = 'chulouwang'.date('Y-m-d',time());
        $safeString = Hash::make($string);
         if (!$request->openid) return '缺少参数';
        return view('we.work_order_salesman', ['openid'=>$request->openid, 'safeString'=>$safeString]);
    }

    /**
     * 说明: 店长 工单处理页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function shopwner(Request $request)
    {
        $string = 'chulouwang'.date('Y-m-d',time());
        $safeString = Hash::make($string);
        if (!$request->openid) return '缺少参数';
        return view('we.work_order_shopowner', ['openid'=>$request->openid, 'safeString'=>$safeString]);
    }
    public function detail(Request $request)
    {
        $string = 'chulouwang'.date('Y-m-d',time());
        $safeString = Hash::make($string);
        return view('we.work_order_detail', ['safeString'=>$safeString]);
    }
}
