<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\CollectionsRequest;
use App\Models\Collection;
use App\Repositories\CollectionsRepository;
use App\Services\OfficeBuildingHousesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionsController extends APIBaseController
{
    /**
     * 说明: 收藏列表
     *
     * @param Request $request
     * @param CollectionsRepository $repository
     * @param OfficeBuildingHousesService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index
    (
        Request $request,
        CollectionsRepository $repository,
        OfficeBuildingHousesService $service
    )
    {
        $res = $repository->collectionList($request, $service);
        return $this->sendResponse($res, '收藏列表获取成功');
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
     * 说明:收藏列表取消收藏
     *
     * @param Collection $collection
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 刘坤涛
     */
    public function destroy(Collection $collection)
    {
        $res =  $collection->delete();
        return $this->sendResponse($res, '收藏删除成功');
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
        $user = Auth::guard('api')->user();
        $res = Collection::where(['user_id' => $user->id, 'house_id' => $id])->delete();
        return $this->sendResponse($res, '取消收藏成功');
    }



}
