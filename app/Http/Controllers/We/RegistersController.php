<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;

class RegistersController extends Controller
{
    /**
     * 说明: 注册页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 罗振
     */
    public function create()
    {
        return view('we.register');
    }
}