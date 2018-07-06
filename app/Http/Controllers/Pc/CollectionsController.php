<?php

namespace App\Http\Controllers\PC;

use App\Http\Requests\App\CollectionsRequest;
use App\Models\Collection;
use App\Repositories\CollectionsRepository;
use App\Services\OfficeBuildingHousesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class CollectionsController extends Controller
{

    //获取当前登录用户的收藏记录
    public function index
    (
        Request $request,
        CollectionsRepository $repository,
        OfficeBuildingHousesService $service
    )
    {
        $res = $repository->collectionList($request, $service);
        return '收藏列表';
    }

    public function store
    (
        CollectionsRepository $repository,
        CollectionsRequest $request
    )
    {
        $res = $repository->addCollection($request);
        return $this->sendResponse($res, '收藏列表添加成功');
    }

    //取消收藏
    public function destroy(Collection $collection)
    {
        $res =  $collection->delete();
        return $this->sendResponse($res, '收藏删除成功');
    }

    //房源详情取消收藏
    public function del($id)
    {
        $user = Session::get('user');
        $res = Collection::where(['user_id' => $user->id, 'house_id' => $id])->delete();
        return $this->sendResponse($res, '收藏取消成功');
    }
}
