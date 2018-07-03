<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\AdminsRequest;
use App\Services\RegistersService;
use Illuminate\Support\Facades\Auth;

class AdminsController extends APIBaseController
{
    public function store
    (
        AdminsRequest $request,
        RegistersService $service
    )
    {
        $res = $service->addAdminUser($request);
        if (!$res) return $this->sendError('添加失败');
        return $this->sendResponse($res,'添加成功');
    }

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
        $res = $user->toArray();
        $res['access'] = $user->getAllPermissions()->pluck('name')->toArray()??[];
        return $this->sendResponse($res, '获取成功');
    }
}