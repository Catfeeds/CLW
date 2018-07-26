<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\EntrustThrowInsRequest;
use App\Repositories\EntrustThrowInsRepository;

class EntrustThrowInsController extends APIBaseController
{
    public function store
    (
        EntrustThrowInsRequest $request,
        EntrustThrowInsRepository $repository
    )
    {
        //房源投放、委托找房
        $res = $repository->add($request,'App');
        if (!$res) return $this->sendError('失败');
        return $this->sendResponse($res, '成功');
    }
}
