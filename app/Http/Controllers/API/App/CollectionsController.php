<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\CollectionsRequest;
use App\Models\Collection;
use App\Repositories\CollectionsRepository;

class CollectionsController extends APIBaseController
{

    /**
     * 说明: 获取收藏列表
     *
     * @param CollectionsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index(CollectionsRepository $repository)
    {
        $res = $repository->collectionList();
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
     * 说明: 取消收藏
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
}
