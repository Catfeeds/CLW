<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\PermissionsRequest;
use App\Models\Permission;
use App\Repositories\PermissionsRepository;

class BackstagePermissionsController extends APIBaseController
{
    public function index(
        PermissionsRepository $repository
    )
    {
        $res = $repository->permissionsList();
        return $this->sendResponse($res,'后台权限列表获取成功');
    }

    public function store
    (
        PermissionsRequest $request,
        PermissionsRepository $repository
    )
    {
        $res = $repository->addPermissions($request);
        return $this->sendResponse($res,'后台权限添加成功');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return $this->sendResponse($permission, '获取权限原始数据成功');
    }


    public function update(
        $id,
        PermissionsRequest $request,
        PermissionsRepository $repository
    )
    {
        $permission = Permission::find($id);
        $res = $repository->updatePermissions($request, $permission);
        if (empty($res)) return $this->sendError('修改失败');
        return $this->sendResponse($res,'修改成功');
    }

    public function destroy($id)
    {
        $res = Permission::find($id)->delete();
        return $this->sendResponse($res,'删除权限成功');
    }

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