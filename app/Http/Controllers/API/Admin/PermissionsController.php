<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\PermissionsRequest;
use App\Models\Permission;
use App\Repositories\PermissionsRepository;

class PermissionsController extends APIBaseController
{
    public function index(
        PermissionsRepository $repository
    )
    {
        $res = $repository->mediaPermissionsList();
        return $this->sendResponse($res,'中介权限列表获取成功');
    }

    public function store(
        PermissionsRequest $request,
        PermissionsRepository $repository
    )
    {
        $res = $repository->addPermissions($request);
        return $this->sendResponse($res,'中介权限添加成功');
    }

    public function edit(
        Permission $permission
    )
    {
        return $this->sendResponse($permission, '获取权限原始数据成功');
    }

    public function update(
        PermissionsRequest $request,
        Permission $permission,
        PermissionsRepository $repository
    )
    {
        $res = $repository->updatePermissions($request, $permission);
        if (empty($res)) return $this->sendError('修改失败');
        return $this->sendResponse($res,'修改成功');
    }

    public function destroy(
        Permission $permission
    )
    {
        $res = $permission->delete();
        return $this->sendResponse($res,'删除权限成功');
    }

    public function permissionsGroup(
        PermissionsRepository $repository
    )
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