<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChat\RegistersRequest;
use App\Services\RegistersService;

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

    /**
     * 说明: 注册
     *
     * @param RegistersRequest $request
     * @param RegistersService $registersService
     * @return \Illuminate\Http\RedirectResponse
     * @author 罗振
     */
    public function store(
        RegistersRequest $request,
        RegistersService $registersService
    )
    {
        $res = $registersService->weAddUser($request);

        if ($res['status'] == false) return redirect('/registers/create')->with('注册失败:'.$res['message']);

        return redirect('/')->with('注册成功:'.$res['message']);
    }
}