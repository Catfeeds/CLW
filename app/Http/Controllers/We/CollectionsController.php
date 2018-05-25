<?php

namespace App\Http\Controllers\We;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\WeChat\CollectionsRequest;
use App\Models\Collection;
use App\Repositories\CollectionsRepository;
use App\Services\OfficeBuildingHousesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    /**
     * 说明: 添加收藏
     *
     * @param CollectionsRepository $repository
     * @param CollectionsRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function store
    (
        CollectionsRepository $repository,
        CollectionsRequest $request
    )
    {
        $res = $repository->addCollection($request);
        return $this->sendResponse($res, '收藏列表添加成功');
    }

    /**
     * 说明: 房源详情取消收藏
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function del($id)
    {
        $user = Session::get('user');
        $res = Collection::where(['user_id' => $user->id, 'house_id' => $id])->delete();
        return $this->sendResponse($res, '收藏取消成功');
    }


}
