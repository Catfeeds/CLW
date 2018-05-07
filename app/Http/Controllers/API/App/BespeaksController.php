<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\BespeaksRequest;
use App\Services\BespeaksService;

class BespeaksController extends APIBaseController
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
        if (empty($result = $bespeaksService->addBespeaks($request))) {
            return $this->sendError('预约失败');
        }

        return $this->sendResponse($result, '预约成功');
    }
}
