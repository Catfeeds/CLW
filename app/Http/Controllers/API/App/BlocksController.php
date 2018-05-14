<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Services\BlocksService;

class BlocksController extends APIBaseController
{
    /**
     * 说明: 找房列表区域搜索条件
     *
     * @param BlocksService $blocksService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function findHouse(
        BlocksService $blocksService
    )
    {
        $res = $blocksService->findHouse();
        return $this->sendResponse($res,'找房列表区域搜索条件获取成功');
    }
}
