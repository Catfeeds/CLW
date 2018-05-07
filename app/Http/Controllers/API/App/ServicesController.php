<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\ServicesRepository;

class ServicesController extends APIBaseController
{
    /**
     * 说明: 服务列表
     * @param ServicesRepository $servicesRepositories
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function index
    (
        ServicesRepository $servicesRepositories
    )
    {
        $res = $servicesRepositories->serviceList();
        return $this->sendResponse($res,'服务列表获取成功');
    }
}

