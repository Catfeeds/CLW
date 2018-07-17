<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\RolesRequest;
use App\Models\Role;
use App\Repositories\RolesRepository;
use App\Handler\Common;

class BackstageRolesController extends APIBaseController
{
    public function index
    (
        RolesRepository $repository
    )
    {
        if (empty(Common::user()->can('backstage_role_list'))) {
            return $this->sendError('无backstage_role_list权限','403');
        }
        $res = $repository->roleList();
        return $this->sendResponse($res,'获取角色列表成功');
    }

    public function store(
        RolesRequest $request,
        RolesRepository $repository
    )
    {
        if (empty(Common::user()->can('backstage_add_role'))) {
            return $this->sendError('无backstage_add_role权限','403');
        }
        $res = $repository->addRole($request);
        if (empty($res)) return $this->sendError('角色添加失败');
        return $this->sendResponse($res,'角色添加成功');
    }

    public function edit($id)
    {
        // 角色所有权限
        $role = Role::find($id);
        $role->oldPermissions = $role->permissions()->pluck('name')->toArray();
        return $this->sendResponse($role,'获取角色原始数据成功');
    }

    public function update(
        $id,
        RolesRequest $request,
        RolesRepository $repository
    )
    {
        if (empty(Common::user()->can('backstage_update_role'))) {
            return $this->sendError('无backstage_update_role权限','403');
        }
        $role = Role::find($id);
        $res = $repository->updateRole($request, $role);
        if (empty($res)) return $this->sendError('角色修改失败');
        return $this->sendResponse($res,'角色修改成功');
    }

    // 获取所有权限
    public function getAllPermissions
    (
        RolesRepository $repository
    )
    {
        $res = $repository->getAllPermissions();
        return $this->sendResponse($res,'获取所有权限数据成功');
    }

    public function getRoles
    (
        RolesRepository $repository
    )
    {
        $res = $repository->getRoles();
        return $this->sendResponse($res,'角色获取成功');
    }
}