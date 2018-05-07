<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\BuildingsRepository;

class BuildingsController extends APIBaseController
{
    /**
     * 说明: 楼盘分页列表
     * @param BuildingsRepository $buildingsRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function index
    (
        BuildingsRepository $buildingsRepository
    )
    {
        $res = $buildingsRepository->getList();
        return $this->sendResponse($res,'显示楼盘分页列表');
    }
}