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
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        BespeaksRequest $request,
        BespeaksService $bespeaksService
    )
    {
        if (empty($result = $bespeaksService->addBespeaks($request))) {
            return false;
        }
        return true;
    }
}
