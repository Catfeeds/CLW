<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;

class LoginsController extends Controller
{
    /**
     * 说明: 登录页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 罗振
     */
    public function create()
    {
        return view('we.login_new');
    }

    /**
     * 说明: 快速登录页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 罗振
     */
    public function quickLogin()
    {
        return view('we.login_quick');
    }
}