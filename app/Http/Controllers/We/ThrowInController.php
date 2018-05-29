<?php

namespace App\Http\Controllers\We;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\ThrowInsRequest;
use App\Repositories\ThrowInsRepository;

class ThrowInController extends APIBaseController
{
    /**
     * 说明: 房源投放
     *
     * @param ThrowInsRepository $repository
     * @param ThrowInsRequest $request
     * @return array
     * @author 刘坤涛
     */
    public function store
    (
        ThrowInsRepository $repository,
        ThrowInsRequest $request
    )
    {
        if (empty($res = $repository->addThrowIn($request, '微信'))) return $this->sendError('房源投放失败');
        return $this->sendResponse($res,'房源投放成功');
    }
}
