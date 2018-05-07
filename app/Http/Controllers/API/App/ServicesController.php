<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Models\Service;
use App\Services\ServicesService;

class ServicesController extends APIBaseController
{
    /**
     * 说明:
     *
     * @param ServicesService $servicesService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function index
    (
        ServicesService $servicesService
    )
    {
        $res = $servicesService->getServices();
        return $this->sendResponse($res,'服务列表获取成功');
    }

    /**
     * 说明: 获取服务信息
     *
     * @param Service $service
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function show(
        Service $service
    )
    {
        return $this->sendResponse($service, '获取服务信息成功');
    }
}

