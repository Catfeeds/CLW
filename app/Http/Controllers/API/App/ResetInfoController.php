<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\ResetInfoRequest;
use App\Services\ResetInfoService;

class ResetInfoController extends APIBaseController
{
    /**
     * 说明: 修改密码
     *
     * @param ResetInfoRequest $request
     * @param ResetInfoService $resetInfoService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function resetPwd(
        ResetInfoRequest $request,
        ResetInfoService $resetInfoService
    )
    {
        $res = $resetInfoService->resetPwd($request);
        return $this->sendResponse($res, '操作成功');
    }

    /**
     * 说明: 旧手机号验证
     *
     * @param ResetInfoRequest $request
     * @param ResetInfoService $resetInfoService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function oldTelValidate(
        ResetInfoRequest $request,
        ResetInfoService $resetInfoService
    )
    {
        $res = $resetInfoService->oldTelValidate($request);
        return $this->sendResponse($res,'操作成功');
    }

    /**
     * 说明: 换绑手机号
     *
     * @param ResetInfoRequest $request
     * @param ResetInfoService $resetInfoService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function resetTel(
        ResetInfoRequest $request,
        ResetInfoService $resetInfoService
    )
    {
        $res = $resetInfoService->resetTel($request);
        return $this->sendResponse($res,'操作成功');
    }
}