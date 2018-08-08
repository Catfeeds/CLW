<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\PermissionsRequest;
use App\Models\Permission;
use App\Repositories\PermissionsRepository;
use App\Handler\Common;

class BackstagePermissionsController extends APIBaseController
{
    //后台权限列表
    public function index(
        PermissionsRepository $repository,
        PermissionsRequest $request
    )
    {
        if (empty(Common::user()->can('backstage_permission_list'))) {
            return $this->sendError('无后台权限列表权限','403');
        }
        $res = $repository->permissionsList($request);
        return $this->sendResponse($res,'后台权限列表获取成功');
    }

    //添加后台权限
    public function store
    (
        PermissionsRequest $request,
        PermissionsRepository $repository
    )
    {
        if (empty(Common::user()->can('backstage_add_permission'))) {
            return $this->sendError('无后台权限添加权限','403');
        }
        $res = $repository->addPermissions($request);
        return $this->sendResponse($res,'后台权限添加成功');
    }

    //后台权限修改之前原始数据
    public function edit($id)
    {
        $permission = Permission::find($id);
        return $this->sendResponse($permission, '获取权限原始数据成功');
    }

    //更新后台权限
    public function update(
        $id,
        PermissionsRequest $request,
        PermissionsRepository $repository
    )
    {
        if (empty(Common::user()->can('backstage_update_permission'))) {
            return $this->sendError('无后台权限修改权限','403');
        }
        $permission = Permission::find($id);
        $res = $repository->updatePermissions($request, $permission);
        if (empty($res)) return $this->sendError('修改失败');
        return $this->sendResponse($res,'修改成功');
    }

    //删除后台权限
    public function destroy($id)
    {
        if (empty(Common::user()->can('backstage_del_permission'))) {
            return $this->sendError('无后台删除权限','403');
        }
        $res = Permission::find($id)->delete();
        return $this->sendResponse($res,'删除权限成功');
    }

    //后台权限组下拉数据
    public function permissionsGroup(PermissionsRepository $repository)
    {
        $res = $repository->permissionsGroup();

        return $this->sendResponse($res->map(function ($v) {
            return [
                'value' => $v->id,
                'label' => $v->group_name
            ];
        }), '获取权限组成功');
    }
}