<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\RegistersRequest;
use App\Services\RegistersService;

class RegisterController extends APIBaseController
{
    /**
     * 说明: 注册
     *
     * @param RegistersRequest $request
     * @param RegistersService $registersService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        RegistersRequest $request,
        RegistersService $registersService
    )
    {
        $result = $registersService->addUser($request);
        if ($result['status'] == false) {
            return $this->sendError($result['message']);
        }

        return $this->sendResponse($result['status'], $result['message']);
    }
}