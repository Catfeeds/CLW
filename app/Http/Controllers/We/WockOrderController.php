<?php

namespace App\Http\Controllers\We;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WockOrderController extends Controller
{

    /**
     * 说明: 业务员 工单处理页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function salesMan()
    {
        return view('we.work_order_salesman');
    }

    /**
     * 说明: 店长 工单处理页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function shopWner()
    {
        return view('we.work_order_shopowner');
    }
}
