<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChat\ResetInfoRequest;
use App\Services\ResetInfoService;

class ResetInfoController extends Controller
{
    /**
     * 说明: 个人中心首页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function index()
    {
        return view('we.user_index');
    }

    /**
     * 说明: 投放房源
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function resources(AreasRepository $repository)
    {
        $res = $repository->areaList();
        $data = $res->map(function($v) {
            return [
                'value' => $v->id,
                'text' => $v->name
            ];
        });
        return view('we.user_house_resources', ['res' => $data]);
    }
    /**
     * 说明: 委托找房
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function findHouse()
    {
        return view('we.user_find_house');
    }

    /**
     * 说明: 关于我们
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function aboutUs()
    {
        return view('we.user_about_us');
    }

    /**
     * 说明: 个人设置
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function setting()
    {
        return view('we.user_setting');
    }

    /**
     * 说明: 修改密码
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function revisePwd()
    {
        return view('we.user_revise_password');
    }

    /**
     * 说明: 验证原号码
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function revisePhone1()
    {
        return view('we.user_revise_phone1');
    }

    /**
     * 说明: 修改号码
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author wh
     */
    public function revisePhone2()
    {
        return view('we.user_revise_phone2');
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