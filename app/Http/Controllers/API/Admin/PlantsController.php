<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\PlantsRequest;
use App\Repositories\PlantsRepository;
use App\Services\LabelsService;
use Illuminate\Http\Request;
use App\Models\Plant;

class PlantsController extends APIBaseController
{
    // 绿植租摆商品列表
    public function index(
        Request $request,
        PlantsRepository $repository
    )
    {
        $res = $repository->plantList($request);
        return $this->sendResponse($res,'绿植租摆商品列表获取成功');
    }

    // 获取标签
    public function create(
        LabelsService $service
    )
    {
        //
        $res = $service->getLabels('绿植租摆');
        return $this->sendResponse($res,'获取标签成功');
    }


    // 添加绿植租摆商品
    public function store(
        PlantsRequest $request,
        PlantsRepository $repository
    )
    {
        $res = $repository->addPlant($request);
        return $this->sendResponse($res,'添加绿植租摆商品成功');
    }

    // 修改绿植租摆之前原始数据
    public function edit(
        Plant $plant
    )
    {
        $plant->goodsHasLabels = $plant->goodsHasLabels->pluck('label_id')->toArray();
        return $this->sendResponse($plant,'修改绿植租摆商品之前原始数据获取成功');
    }
    
    // 修改绿植租摆商品
    public function update(
        Plant $plant,
        PlantsRequest $request,
        PlantsRepository $repository
    )
    {
        $res = $repository->updatePlant($request, $plant);
        if (empty($res)) return $this->sendError('绿植租摆商品修改失败');
        return $this->sendResponse($plant,'绿植租摆商品修改成功');
    }

    public function destroy(
        Plant $plant
    )
    {
        if (empty($res = $plant->delete())) return $this->sendError('绿植租摆商品删除失败');
        return $this->sendResponse($res,'绿植租摆商品删除成功');
    }

}
