<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\AdminsRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Services\RegistersService;
use Illuminate\Support\Facades\Auth;
use App\Handler\Common;

class AdminsController extends APIBaseController
{
    public function store
    (
        AdminsRequest $request,
        RegistersService $service
    )
    {
        if (empty(Common::user()->can('add_admin_user'))) {
            return $this->sendError('无添加后台管理权限','403');
        }
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

    public function index( AdminsRequest $request)
    {
        $res = Admin::where([])->paginate($request->per_page??10);
        foreach ($res as $v) {
            if ($v->hasAnyRole(Role::all())) {
                $name = $v->getRoleNames()[0];
                $v->role_name = Role::where('name', $name)->value('name_cn');
            }
        }
        return $this->sendResponse($res, '用户列表获取成功');
    }

    public function edit(Admin $admin)
    {
        return $this->sendResponse($admin, '用户修改之前数据');
    }

    //修改用户
    public function Update
    (
        Admin $admin,
        AdminsRequest $request,
        RegistersService $service
    )
    {
        $res = $service->update($admin, $request);
        if (!$res) return $this->sendError('修改失败');
        return $this->sendResponse($res, '修改成功');
    }

}