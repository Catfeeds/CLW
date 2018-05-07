<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\AreasRepository;

class AreasController extends APIBaseController
{
    /**
     * 说明: 获取区域列表
     *
     * @param AreasRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index
    (
        AreasRepository $repository
    )
    {
        $res = $repository->areaList();
        return $this->sendResponse($res, '区域列表获取成功');
    }

    /**
     * 说明: 获取该区域下的商圈
     *
     * @param AreasRepository $repository
     * @param $area_id
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function BlockList
    (
        AreasRepository $repository, $area_id
    )
    {
        $res = $repository->getBlockList($area_id);
        return $this->sendResponse($res,'该区域下的商圈获取成功');
    }

}
