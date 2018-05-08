<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\BuildingDetailsRepository;

class BuildingDetailsController extends APIBaseController
{
    /**
     * 说明: 获取单条数据详情
     * @param BuildingDetailsRepository $buildingDetailsRepository
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function show(
        BuildingDetailsRepository $buildingDetailsRepository,
        $id
    )
    {
        $res = $buildingDetailsRepository->getShow($id);
        return $this->sendResponse($res,'获取单条详情');
    }
}