<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\EntrustThrowInsRequest;
use App\Repositories\EntrustThrowInsRepository;

class EntrustThrowInsController extends Controller
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
