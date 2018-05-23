<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChat\ResetInfoRequest;
use App\Services\ResetInfoService;

class ResetInfoController extends Controller
{
    /**
     * 说明: 修改密码视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 罗振
     */
    public function resetPwdView()
    {
        return view('we.user_revise_password');
    }
    
    /**
     * 说明: 修改密码
     *
     * @param ResetInfoRequest $request
     * @param ResetInfoService $resetInfoService
     * @return array
     * @author 罗振
     */
    public function resetPwd(
        ResetInfoRequest $request,
        ResetInfoService $resetInfoService
    )
    {
        $res = $resetInfoService->resetPwd($request);
        return $res;
    }

    /**
     * 说明: 旧手机号验证视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 罗振
     */
    public function oldTelValidateView()
    {
        return view('we.user_revise_phone1');
    }

    /**
     * 说明: 旧手机号验证
     *
     * @param ResetInfoRequest $request
     * @param ResetInfoService $resetInfoService
     * @return array
     * @author 罗振
     */
    public function oldTelValidate(
        ResetInfoRequest $request,
        ResetInfoService $resetInfoService
    )
    {
        $res = $resetInfoService->oldTelValidate($request);
        return $res;
    }

    /**
     * 说明: 换绑手机号视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 罗振
     */
    public function resetTelView()
    {
        return view('we.user_revise_phone2');
    }

    /**
     * 说明: 换绑手机号
     *
     * @param ResetInfoRequest $request
     * @param ResetInfoService $resetInfoService
     * @return array
     * @author 罗振
     */
    public function resetTel(
        ResetInfoRequest $request,
        ResetInfoService $resetInfoService
    )
    {
        $res = $resetInfoService->resetTel($request);
        return $res;
    }
}