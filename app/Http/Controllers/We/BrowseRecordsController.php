<?php

namespace App\Http\Controllers\We;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\BrowseRecordsRepository;
use App\Services\OfficeBuildingHousesService;
use Illuminate\Http\Request;

class BrowseRecordsController extends APIBaseController
{
    /**
     * 说明: 用户浏览记录
     *
     * @param Request $request
     * @param OfficeBuildingHousesService $service
     * @param BrowseRecordsRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 罗振
     */
    public function index
    (
        Request $request,
        OfficeBuildingHousesService $service,
        BrowseRecordsRepository $repository
    )
    {
        $res = $repository->browseRecordList($request, $service,true);
        return view('we.user_browsing_history',['res' => $res]);
    }

    /**
     * 说明: ajax获取浏览记录数据
     *
     * @param Request $request
     * @param OfficeBuildingHousesService $service
     * @param BrowseRecordsRepository $repository
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @author 罗振
     */
    public function ajaxBrowseRecord(
        Request $request,
        OfficeBuildingHousesService $service,
        BrowseRecordsRepository $repository
    )
    {
        if (empty($res = $repository->browseRecordList($request, $service,true))) return $this->sendError('ajax获取浏览记录数据失败');
        return $this->sendResponse($res,'ajax获取浏览记录数据成功');
    }
}
