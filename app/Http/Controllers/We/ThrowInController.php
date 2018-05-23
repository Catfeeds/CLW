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
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function store
    (
        ThrowInsRepository $repository,
        ThrowInsRequest $request
    )
    {
        $res = $repository->addThrowIn($request);
       if (!$res) return false;
       return true;
    }
}
