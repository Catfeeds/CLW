<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Models\User;
use App\Services\LoginsService;
use Illuminate\Http\Request;

class LoginsController extends APIBaseController
{
    /**
     * 说明: 账号密码登录
     *
     * @param Request $request
     * @param LoginsService $loginsService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        Request $request,
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

        return $this->sendResponse($passport['data'], '获取token成功！');
    }
}