<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\BrowseRecordsRepository;
use App\Services\HousesService;
use Illuminate\Http\Request;

class BrowseRecordsController extends APIBaseController
{
    /**
     * 说明: 获取浏览记录表
     *
     * @param Request $request
     * @param HousesService $service
     * @param BrowseRecordsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index
    (
        Request $request,
        HousesService $service,
        BrowseRecordsRepository $repository
    )
    {
        $res = $repository->browseRecordList($request);
        $service->HouseInfo($res);
        return $this->sendResponse($res, '浏览记录获取成功');
    }
}
