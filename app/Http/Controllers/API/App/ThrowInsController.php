<?php

namespace App\Http\Controllers\API\APP;


use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\ThrowInsRequest;
use App\Repositories\ThrowInsRepository;

class ThrowInsController extends APIBaseController
{

    /**
     * 说明: 房源投放
     *
     * @param ThrowInsRepository $repository
     * @param ThrowInsRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function store
    (
        ThrowInsRepository $repository,
        ThrowInsRequest $request
    )
    {
        if (empty($res = $repository->addThrowIn($request, 'App'))) return $this->sendError('投放失败');
        return $this->sendResponse($res, '投放房源添加成功');
    }
}
