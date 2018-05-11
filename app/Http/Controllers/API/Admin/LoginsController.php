<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\LoginsRequest;
use App\Services\LoginsService;

class LoginsController extends APIBaseController
{

    public function store(
        LoginsRequest $request,
        LoginsService $loginsService
    )
    {
        $token = $loginsService->adminLogin($request);

        return $this->sendResponse(['status' => true, 'token' => $token], '获取token成功！');
    }


}