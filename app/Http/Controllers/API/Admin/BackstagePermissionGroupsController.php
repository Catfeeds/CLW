<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\PermissionGroupsRequest;
use App\Repositories\PermissionGroupsRepository;
use App\Handler\Common;

class BackstagePermissionGroupsController extends APIBaseController
{
    //后台权限组列表
    public function index
    (
        PermissionGroupsRequest $request,
        PermissionGroupsRepository $repository
    )
    {
        if (empty(Common::user()->can('backstage_permission_groups_list'))) {
            return $this->sendError('无权限组列表权限','403');
        }
        $res = $repository->permissionGroupsList($request);
        return $this->sendResponse($res,'权限组列表成功');
    }

    //后台添加权限组
    public function store
    (
        PermissionGroupsRequest $request,
        PermissionGroupsRepository $repository
    )
    {
        if (empty(Common::user()->can('backstage_add_permission_groups'))) {
            return $this->sendError('无添加权限组权限','403');
        }
        $res = $repository->addPermissionGroups($request);
        return $this->sendResponse($res,'添加权限组成功');
    }
}