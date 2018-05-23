<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChat\LoginsRequest;
use App\Services\LoginsService;
use Illuminate\Support\Facades\Session;

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
     * @return array
     * @author 罗振
     */
    public function store(
        LoginsRequest $request,
        LoginsService $loginsService
    )
    {
        dd(1);
        $res = $loginsService->webPwdLogin($request);

        return $res;
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

    /**
     * 说明: 短信登录
     *
     * @param LoginsRequest $request
     * @param LoginsService $loginsService
     * @return array
     * @author 罗振
     */
    public function quickLogin(
        LoginsRequest $request,
        LoginsService $loginsService
    )
    {
        $res = $loginsService->quickLogin($request);

        return $res;
    }
    /**
     * 说明: 忘记密码页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 王浩
     */
    public function forget_login()
    {
        return view('we.login_password');
    }

    /**
     * 说明: 退出登录
     *
     * @return array
     * @author 罗振
     */
    public function logout()
    {
        Session::forget('user');
        return ['status' => true, 'message' => '退出成功'];
    }

}