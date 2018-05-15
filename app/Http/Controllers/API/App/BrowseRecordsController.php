<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\BrowseRecordsRepository;
use App\Services\HousesService;

class BrowseRecordsController extends APIBaseController
{

    /**
     * 说明: 获取浏览记录表
     *
     * @param HousesService $service
     * @param BrowseRecordsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index
    (
        HousesService $service,
        BrowseRecordsRepository $repository
    )
    {
        $res = $repository->browseRecordList();
        $service->HouseInfo($res);
        return $this->sendResponse($res, '浏览记录获取成功');
    }
}
