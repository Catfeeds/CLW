<?php

namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\BespeaksRequest;
use App\Services\BespeaksService;

class BespeakController extends Controller
{
    /**
     * 说明: 预约
     *
     * @param BespeaksRequest $request
     * @param BespeaksService $bespeaksService
     * @return array
     * @author 罗振
     */
    public function store(
        BespeaksRequest $request,
        BespeaksService $bespeaksService
    )
    {
        if (!empty($res = $bespeaksService->addBespeaks($request))) {
            return ['status' => true, 'message' => '预约成功'];
        } else {
            return ['status' => false, 'message' => '预约失败'];
        }
    }
}
