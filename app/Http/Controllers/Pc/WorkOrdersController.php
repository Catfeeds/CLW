<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WorkOrdersRequest;
use App\Repositories\WorkOrdersRepository;

class WorkOrdersController extends Controller
{
    // 投放委托
    public function store
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        $res = $repository->addWorkOrder($request);
        if (!$res) return $this->sendError('添加失败');
        return $this->sendResponse($res, '添加成功');
    }
}
