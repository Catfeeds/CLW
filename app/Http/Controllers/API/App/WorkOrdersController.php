<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\WorkOrdersRequest;
use App\Repositories\WorkOrdersRepository;

class WorkOrdersController extends APIBaseController
{
    // app投放委托
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
