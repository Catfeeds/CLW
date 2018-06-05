<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\HomePagesRepository;
use App\Services\HomePagesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePagesController extends APIBaseController
{
    private $id;

    public function __construct()
    {
        $this->id= Auth::guard('admin')->user()->id;
    }

    /**
     * 说明: 后台首页数据
     *
     * @param HomePagesService $service
     * @param HomePagesRepository $repository
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index
    (
        HomePagesService $service,
        HomePagesRepository $repository,
        Request $request
    )
    {
        $date = $service->getTime($request->time);
        $res = $repository->getData($date, $this->id);
        return $this->sendResponse($res, '获取成功');
    }

    public function waitTrackHouse
    (
        HomePagesRepository $repository,
        HomePagesService $service
    )
    {
        $res = $repository->waitTrackHouse($this->id, $service);
        return $this->sendResponse($res, '获取待跟进房源数据成功');
    }


}
