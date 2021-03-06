<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\WorkOrdersRequest;
use App\Http\Requests\App\EntrustThrowInsRequest;
use App\Repositories\EntrustThrowInsRepository;
use App\Repositories\WorkOrdersRepository;

class EntrustThrowInsController extends APIBaseController
{
    public function store
    (
        WorkOrdersRequest $request,
        WorkOrdersRepository $repository
    )
    {
        //房源投放、委托找房
        $res = $repository->addWorkOrder($request);
        if (!$res) return $this->sendError('失败');
        return $this->sendResponse($res, '成功');
    }
}
