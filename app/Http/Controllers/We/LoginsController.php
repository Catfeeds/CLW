<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChat\LoginsRequest;
use App\Services\LoginsService;

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
     * 说明: 账号密码登录
     *
     * @param LoginsRequest $request
     * @param LoginsService $loginsService
     * @return \Illuminate\Http\RedirectResponse
     * @author 罗振
     */
    public function store(
        LoginsRequest $request,
        LoginsService $loginsService
    )
    {
        $res = $loginsService->webPwdLogin($request);

        if ($res['status'] == false) return redirect('/logins/create')->with('登录失败:'.$res['message']);

        return redirect('/')->with('登录成功:'.$res['message']);
    }
    
    /**
     * 说明: 快速登录页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 罗振
     */
    public function quickLoginView()
    {
        return view('we.login_quick');
    }

    public function quickLogin(
        LoginsRequest $request,
        LoginsService $loginsService
    )
    {



    }
    
}