<?php

namespace App\Http\Controllers\We;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\BespeaksRequest;
use App\Services\BespeaksService;

class BespeakController extends APIBaseController
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
        if (!empty($res = $bespeaksService->addBespeaks($request, '微信'))) return $this->sendResponse($res,'预约成功');
        return $this->sendError('预约失败');
    }
}
