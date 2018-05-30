<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use Illuminate\Support\Facades\Auth;

class AdminsController extends APIBaseController
{
    /**
     * 说明: 用户信息
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function show($id)
    {
        $user = Auth::guard('admin')->user();
        if (empty($user)) {
            return $this->sendError('登录账户异常');
        }
        return $this->sendResponse($user, '成功');
    }
}