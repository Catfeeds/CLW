<?php

namespace App\Http\Controllers\We;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\CollectionsRepository;
use App\Services\OfficeBuildingHousesService;
use Illuminate\Http\Request;

class CollectionsController extends APIBaseController
{
    /**
     * 说明: 收藏记录
     *
     * @param Request $request
     * @param CollectionsRepository $repository
     * @param OfficeBuildingHousesService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function index
    (
        Request $request,
        CollectionsRepository $repository,
        OfficeBuildingHousesService $service
    )
    {
        $res = $repository->collectionList($request, $service);
        return view('we.user_collect', ['res' => $res]);
    }

    /**
     * 说明: ajax获取收藏记录
     *
     * @param Request $request
     * @param CollectionsRepository $repository
     * @param OfficeBuildingHousesService $service
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @author 罗振
     */
    public function ajaxCollection(
        Request $request,
        CollectionsRepository $repository,
        OfficeBuildingHousesService $service
    )
    {
        if (empty($res = $repository->collectionList($request, $service))) return $this->sendError('ajax获取收藏记录失败');
        return $this->sendResponse($res, 'ajax获取收藏记录成功');
    }

}
