<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\ComputersRequest;
use App\Models\Computer;
use App\Repositories\ComputersRepository;
use App\Services\LabelsService;
use Illuminate\Http\Request;

class ComputersController extends APIBaseController
{
    // 办公设备商品列表
    public function index(
        Request $request,
        ComputersRepository $repository
    )
    {
        $res = $repository->computerList($request);
        return $this->sendResponse($res,'办公设备商品列表获取成功');
    }

    // 获取标签
    public function create(
        LabelsService $service
    )
    {
        $res = $service->getLabels('办公设备');
        return $this->sendResponse($res,'获取标签成功');
    }


    // 添加办公设备商品
    public function store(
        ComputersRequest $request,
        ComputersRepository $repository
    )
    {
        $res = $repository->addComputer($request);
        return $this->sendResponse($res,'添加办公设备商品成功');
    }

    // 修改办公设备之前原始数据
    public function edit(
        Computer $computer
    )
    {
        $computer->goodsHasLabels = $computer->goodsHasLabels->pluck('label_id')->toArray();
        return $this->sendResponse($computer,'修改办公设备商品之前原始数据获取成功');
    }

    // 修改办公设备商品
    public function update(
        Computer $computer,
        ComputersRequest $request,
        ComputersRepository $repository
    )
    {
        $res = $repository->updateComputer($request, $computer);
        if (empty($res)) return $this->sendError('办公设备商品修改失败');
        return $this->sendResponse($res,'办公设备商品修改成功');
    }

    // 删除
    public function destroy(
        Computer $computer
    )
    {
        if (empty($res = $computer->delete())) return $this->sendError('办公设备商品删除失败');
        return $this->sendResponse($res,'办公设备商品删除成功');
    }

}
