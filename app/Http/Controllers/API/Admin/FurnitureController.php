<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\FurnitureRequest;
use App\Http\Requests\Admin\PlantsRequest;
use App\Models\Furniture;
use App\Repositories\FurnitureRepository;
use App\Repositories\PlantsRepository;
use App\Services\LabelsService;
use Illuminate\Http\Request;
use App\Models\Plant;

class FurnitureController extends APIBaseController
{
    // 绿植租摆商品列表
    public function index(
        Request $request,
        FurnitureRepository $repository
    )
    {
        $res = $repository->furnitureList($request);
        return $this->sendResponse($res,'办公家具商品列表获取成功');
    }

    // 获取标签
    public function create(
        LabelsService $service
    )
    {
        //
        $res = $service->getLabels('办公家具');
        return $this->sendResponse($res,'获取标签成功');
    }

    // 添加办公家具商品
    public function store(
        FurnitureRequest $request,
        FurnitureRepository $repository
    )
    {
        $res = $repository->addFurniture($request);
        return $this->sendResponse($res,'添加绿植租摆商品成功');
    }

    // 修改绿植租摆之前原始数据
    public function edit(
        Furniture $furniture
    )
    {
        $furniture->goodsHasLabels = $furniture->goodsHasLabels->pluck('label_id')->toArray();
        return $this->sendResponse($furniture,'修改绿植租摆商品之前原始数据获取成功');
    }

    // 修改办公家具商品
    public function update(
        Furniture $furniture,
        FurnitureRequest $request,
        FurnitureRepository $repository
    )
    {
        $res = $repository->updateFurniture($request, $furniture);
        if (empty($res)) return $this->sendError('办公家具商品修改失败');
        return $this->sendResponse($res,'办公家具商品修改成功');
    }

    public function destroy(
        Furniture $furniture
    )
    {
        if (empty($res = $furniture->delete())) return $this->sendError('办公家具商品删除失败');
        return $this->sendResponse($res,'办公家具商品删除成功');
    }

}
