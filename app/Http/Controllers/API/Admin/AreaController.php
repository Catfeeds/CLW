<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Services\AreaService;

class AreaController extends APIBaseController
{
    /**
     * 说明: 获取所有商圈
     *
     * @param AreaService $areaService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function allBuildingBlock(
        AreaService $areaService
    )
    {
        $result= $areaService->allBuildingBlock();
        return $this->sendResponse($result,'所有商圈信息获取成功');
    }


    public function store()
    {



    }
}