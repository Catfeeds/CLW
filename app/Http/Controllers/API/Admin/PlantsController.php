<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\PlantsRequest;
use App\Repositories\PlantsRepository;
use Illuminate\Http\Request;

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


    // 添加绿植租摆商品
    public function store(
        PlantsRequest $request,
        PlantsRepository $repository
    )
    {
        $res = $repository->addPlant($request);
        return $this->sendResponse($res,'添加绿植租摆商品成功');
    }


}
