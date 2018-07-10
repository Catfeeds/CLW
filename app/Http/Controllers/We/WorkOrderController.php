<?php

namespace App\Http\Controllers\We;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        $string = 'chulouwang'.date('Y-m-d',time());
        $safeString = Hash::make($string);

         $openid = $request->openid;
         if (!$openid) return response('缺少参数','404');
        //通过openid查询电话
         $tel = $this->getTel($openid);
         if (!$tel) return response('缺少参数','404');
        return view('we.work_order_salesman', ['tel'=>$tel, 'safeString'=>$safeString]);
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

        $openid = $request->openid;
        if (!$openid) return response('缺少参数','404');
        //通过openid查询电话
        $tel = $this->getTel($openid);
        if (!$tel) return response('缺少参数','404');
        return view('we.work_order_shopowner', ['tel'=>$tel, 'safeString'=>$safeString]);
    }

    //通过openid查询手机号
    public function getTel($id)
    {
        return Employee::where('openid', $id)->value('tel');
    }
}
