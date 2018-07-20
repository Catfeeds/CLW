<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\ServiceLabelsRequest;
use App\Models\ServiceLabel;
use App\Repositories\ServiceLabelsRepository;
use App\Handler\Common;

class ServiceLabelsController extends APIBaseController
{
    /**
     * 说明: 服务标签列表
     *
     * @param ServiceLabelsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function index(
        ServiceLabelsRepository $repository
    )
    {
        if (empty(Common::user()->can('service_label_list'))) {
            return $this->sendError('无服务标签列表权限','403');
        }
        $res = $repository->serviceLabelList();
        return $this->sendResponse($res,'服务标签列表获取成功');
    }

    /**
     * 说明: 添加服务标签
     *
     * @param ServiceLabelsRequest $request
     * @param ServiceLabelsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        ServiceLabelsRequest $request,
        ServiceLabelsRepository $repository
    )
    {
        if (empty(Common::user()->can('add_service_label'))) {
            return $this->sendError('无服务标签添加权限','403');
        }
        $res = $repository->addServiceLabel($request);
        return $this->sendResponse($res,'服务标签添加成功');
    }

    /**
     * 说明: 获取修改服务标签原始数据
     *
     * @param ServiceLabel $serviceLabel
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function edit(
        ServiceLabel $serviceLabel
    )
    {
        return $this->sendResponse($serviceLabel,'修改前原始数据获取成功');
    }

    /**
     * 说明: 修改服务标签
     *
     * @param ServiceLabel $serviceLabel
     * @param ServiceLabelsRequest $request
     * @param ServiceLabelsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function update(
        ServiceLabel $serviceLabel,
        ServiceLabelsRequest $request,
        ServiceLabelsRepository $repository
    )
    {
        if (empty(Common::user()->can('update_service_label'))) {
            return $this->sendError('无服务标签修改权限','403');
        }
        $res = $repository->updateServiceLabel($request, $serviceLabel);
        if (empty($res)) return $this->sendError('服务标签修改失败');
        return $this->sendResponse($res,'服务标签修改成功');
    }

    /**
     * 说明: 获取所有服务标签
     *
     * @param ServiceLabelsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function allServiceLabels(
        ServiceLabelsRepository $repository
    )
    {
        $res = $repository->allServiceLabel();
        return $this->sendResponse($res->map(function ($v) {
            return [
                'value' => $v->id,
                'label' => $v->name,
            ];
        }),'所有服务标签列表获取成功');
    }
}
