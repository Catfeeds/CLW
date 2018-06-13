<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\MediaPermissionsRequest;
use App\Models\MediaPermission;
use App\Repositories\MediaPermissionsRepository;

class MediaPermissionsController extends APIBaseController
{
    /**
     * 说明: 权限列表
     *
     * @param MediaPermissionsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function index(
        MediaPermissionsRepository $repository
    )
    {
        $res = $repository->mediaPermissionsList();
        return $this->sendResponse($res,'中介权限列表获取成功');
    }

    /**
     * 说明: 添加权限
     *
     * @param MediaPermissionsRequest $request
     * @param MediaPermissionsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        MediaPermissionsRequest $request,
        MediaPermissionsRepository $repository
    )
    {
        $res = $repository->addMediaPermissions($request);
        return $this->sendResponse($res,'中介权限添加成功');
    }

    /**
     * 说明: 获取权限原始数据
     *
     * @param MediaPermission $mediaPermission
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function edit(
        MediaPermission $mediaPermission
    )
    {
        return $this->sendResponse($mediaPermission, '获取权限原始数据成功');
    }

    /**
     * 说明: 修改权限信息
     *
     * @param MediaPermissionsRequest $request
     * @param MediaPermission $mediaPermission
     * @param MediaPermissionsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function update(
        MediaPermissionsRequest $request,
        MediaPermission $mediaPermission,
        MediaPermissionsRepository $repository
    )
    {
        $res = $repository->updateMediaPermissions($request, $mediaPermission);
        if (empty($res)) return $this->sendError('修改失败');
        return $this->sendResponse($res,'修改成功');
    }

    /**
     * 说明: 获取权限组
     *
     * @param MediaPermissionsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function mediaPermissionsGroup(
        MediaPermissionsRepository $repository
    )
    {
        $res = $repository->getMediaPermissionGroup();

        return $this->sendResponse($res->map(function ($v) {
            return [
                'value' => $v->id,
                'label' => $v->group_name
            ];
        }), '获取权限组成功');
    }
}