<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\LoginsRequest;
use App\Services\LoginsService;

class LoginsController extends APIBaseController
{
    /**
     * 说明: 登录
     *
     * @param LoginsRequest $request
     * @param LoginsService $loginsService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        LoginsRequest $request,
        LoginsService $loginsService
    )
    {
        $result = $loginsService->adminLogin($request);
        if (empty($result['status'])) return $this->sendError($result['message']);
        return $this->sendResponse($result, '获取token成功！');
    }

    /**
     * 说明: 退出登录
     *
     * @param LoginsService $loginsService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function logout(
        LoginsService $loginsService
    )
    {
        $result = $loginsService->logout('admin');
        return $this->sendResponse($result, '退出成功！');
    }
}