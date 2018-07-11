<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\LabelsRequest;
use App\Models\Label;
use App\Repositories\LabelsRepository;

class LabelsController extends APIBaseController
{

    //标签列表
    public function index
    (
        LabelsRequest $request,
        LabelsRepository $repository
    )
    {
        $res = $repository->labelList($request);
        return $this->sendResponse($res, '标签列表获取成功');
    }

    //添加标签
    public function store
    (
        LabelsRequest $request,
        LabelsRepository $repository
    )
    {
        $res = $repository->addLabel($request);
        return $this->sendResponse($res, '标签添加成功');
    }

    //修改标签之前原始数据
    public function edit(Label $label)
    {
        return $this->sendResponse($label,'标签修改之前原始数据');
    }

    //修改标签
    public function update
    (
        Label $label,
        LabelsRepository $repository,
        LabelsRequest $request
    )
    {
        $res = $repository->updateLabel($label, $request);
        if (!$res) return $this->sendError('标签修改失败');
        return $this->sendResponse($res,'标签修改成功');
    }

    public function destroy()
    {
    }
}
