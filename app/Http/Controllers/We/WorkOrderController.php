<?php

namespace App\Http\Controllers\We;

use App\Http\Requests\Admin\WorkOrdersRequest;
use App\Models\WorkOrder;
use App\Repositories\WorkOrdersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class WorkOrderController extends Controller
{

    // 手机工单列表
    public function index
    (
        WorkOrdersRequest $request
    )
    {
        $openid = $request->openid;
        $string = 'chulouwang'.date('Y-m-d',time());
        return view('we.work_order_list', ['openid' => $openid, 'string' => $string]);
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
        // 经纪人guid
        $user_guid = $repository->getUserGuid($request->openid);
        $res = $repository->getShow($workOrder, $user_guid);
        // dd($user_guid);
        return view('we.work_order_detail', ['res' => $res, 'safeString' => $string, 'user_guid' => $user_guid]);
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
}
