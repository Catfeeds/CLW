<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\PermissionGroupsRequest;
use App\Repositories\PermissionGroupsRepository;

class BackstagePermissionGroupsController extends APIBaseController
{
    public function index
    (
        PermissionGroupsRequest $request,
        PermissionGroupsRepository $repository
    )
    {
        $res = $repository->permissionGroupsList($request->per_page);
        return $this->sendResponse($res,'权限组列表成功');
    }

    public function store
    (
        PermissionGroupsRequest $request,
        PermissionGroupsRepository $repository
    )
    {
        $res = $repository->addPermissionGroups($request);
        return $this->sendResponse($res,'添加权限组成功');
    }
}