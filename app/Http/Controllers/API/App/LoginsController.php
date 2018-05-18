<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\LoginsRequest;
use App\Models\User;
use App\Services\LoginsService;

class LoginsController extends APIBaseController
{
    /**
     * 说明: 账号密码登录
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
        $user = User::where([
            'tel' => $request->tel,
        ])->first();
        if (empty($user)) {
            return $this->sendError('用户不存在');
        }
        $passport = $loginsService->applyPasswordToken($request->tel, $request->password);
        if (empty($passport['success'])) {
            return $this->sendError($passport['message']);
        }

        // 最后登录时间
        $user->last_login_time = date('Y.m.d H:i:s', time());

        if (!$user->save()) {
            return $this->sendError('最后登录时间更新失败');
        }

        return $this->sendResponse(['status' => true, 'token' => $passport['token']], '获取token成功！');
    }

    /**
     * 说明: 短信登录
     *
     * @param LoginsRequest $request
     * @param LoginsService $loginsService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function smsLogin(
        LoginsRequest $request,
        LoginsService $loginsService
    )
    {
        $token = $loginsService->smsLogin($request);
        return $this->sendResponse($token, '获取token成功！');
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
        $result = $loginsService->logout('api');
        return $this->sendResponse($result, '退出成功！');
    }
}