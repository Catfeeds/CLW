<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\RegistersRequest;
use App\Services\RegistersService;

class RegistersController extends APIBaseController
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
        $result = $registersService->weAddUser($request);
        if ($result['status'] == false) {
            return $this->sendError($result['message']);
        }

        return $this->sendResponse($result, '注册成功');
    }
}