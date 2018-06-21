<?php

namespace App\Http\Controllers\We;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkOrderController extends Controller
{

    /**
     * 说明: 业务员 工单处理页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function salesman(Request $request)
    {
        $openid = $request->id;
        //通过openid查询电话
        $tel = $this->getTel($openid);
        return view('we.work_order_salesman')->with('tel', $tel);
    }

    /**
     * 说明: 店长 工单处理页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function shopwner(Request $request)
    {
        $openid = $request->id;
        //通过openid查询电话
        $tel = $this->getTel($openid);
        return view('we.work_order_shopowner')->with('tel', $tel);
    }

    //通过openid查询手机号
    public function getTel($id)
    {
        return Employee::where('openid', $id)->value('tel');
    }
}
