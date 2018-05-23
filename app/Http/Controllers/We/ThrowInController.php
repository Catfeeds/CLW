<?php

namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\ThrowInsRequest;
use App\Repositories\ThrowInsRepository;

class ThrowInController extends Controller
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
        if (!empty($res = $repository->addThrowIn($request))) {
            return ['status' => true, 'message' => '投放成功'];
        } else {
            return ['status' => false, 'message' => '投放失败'];
        }
    }
}
