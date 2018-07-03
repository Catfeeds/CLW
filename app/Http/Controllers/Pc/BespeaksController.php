<?php

namespace App\Http\Controllers\PC;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\BespeaksRequest;
use App\Services\BespeaksService;

class BespeaksController extends Controller
{
    /**
     * 说明: 预约
     *
     * @param BespeaksRequest $request
     * @param BespeaksService $bespeaksService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        BespeaksRequest $request,
        BespeaksService $bespeaksService
    )
    {
        if (empty($result = $bespeaksService->addBespeaks($request, 'PC'))) {
            return $this->sendError('预约失败');
        }
        return $this->sendResponse($result, '预约成功');
    }
}
