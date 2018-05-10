<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\RetrievePwdRequest;
use App\Services\RetrievePwdService;

class RetrievePwdController extends APIBaseController
{
    /**
     * 说明: 找回密码
     *
     * @param RetrievePwdRequest $request
     * @param RetrievePwdService $retrievePwdService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        RetrievePwdRequest $request,
        RetrievePwdService $retrievePwdService
    )
    {
        $result = $retrievePwdService->retrievePwd($request);
        if ($result['status'] == false) {
            return $this->sendError($result['message']);
        }

        return $this->sendResponse($result['status'], $result['message']);
    }
}