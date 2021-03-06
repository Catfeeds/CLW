<?php

namespace App\Http\Controllers\We;

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
        $res = $repository->add($request);
        if (!$res) return $this->sendError('失败');
        return $this->sendResponse($res, '成功');
    }
}
