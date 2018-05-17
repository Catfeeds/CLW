<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\ServiceLabelsRequest;
use App\Models\ServiceLabel;
use App\Repositories\ServiceLabelsRepository;

class ServiceLabelsController extends APIBaseController
{
    public function index(
        ServiceLabelsRepository $repository
    )
    {
        $res = $repository->serviceLabelList();
        return $this->sendResponse($res,'服务标签列表获取成功');
    }

    public function store(
        ServiceLabelsRequest $request,
        ServiceLabelsRepository $repository
    )
    {
        $res = $repository->addServiceLabel($request);
        return $this->sendResponse($res,'服务标签添加成功');
    }

    public function edit(
        ServiceLabel $serviceLabel
    )
    {
        return $this->sendResponse($serviceLabel,'修改前原始数据获取成功');
    }

    public function update(
        ServiceLabel $serviceLabel,
        ServiceLabelsRequest $request,
        ServiceLabelsRepository $repository
    )
    {
        $res = $repository->updateServiceLabel($request, $serviceLabel);
        if (empty($res)) return $this->sendError('服务标签修改失败');
        return $this->sendResponse($res,'服务标签修改成功');
    }

    public function allServiceLabels(
        ServiceLabelsRepository $repository
    )
    {
        $res = $repository->serviceLabelList();
        return $this->sendResponse($res->map(function ($v) {
            return [
                'value' => $v->id,
                'label' => $v->name,
            ];
        }),'所有服务标签列表获取成功');
    }
}
