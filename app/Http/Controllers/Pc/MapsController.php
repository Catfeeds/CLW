<?php

namespace App\Http\Controllers\PC;

use App\Http\Controllers\Controller;
use App\Services\MapsService;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    // 根据当前gps指定距离获取周边楼盘
    public function getPeripheryBuildings(
        Request $request,
        MapsService $service
    )
    {
        $res = $service->getPeripheryBuildings($request);
        return $this->sendResponse($res,'获取周边楼盘成功');
    }



}
