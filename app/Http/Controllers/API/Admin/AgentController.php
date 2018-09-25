<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\AgentsService;

class AgentController extends Controller
{
    // 获取楚楼网店长以上级别的人员
    public function index
    (
        AgentsService $service
    )
    {
        $res = $service->getUSer();
        return $this->sendResponse($res, '获取成功');
    }
}
