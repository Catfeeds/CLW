<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\EntrustThrowInsRequest;
use App\Repositories\EntrustThrowInsRepository;
use App\Services\HousesService;
use App\Services\StatisticsService;

class EntrustThrowInsController extends APIBaseController
{
    public function index
    (
        EntrustThrowInsRequest $request,
        EntrustThrowInsRepository $repository,
        StatisticsService $service
    )
    {
        //投放、委托列表
        $res = $repository->getList($request, $service);
        return $this->sendResponse($res, '列表获取成功');
    }

    public function survey
    (
        EntrustThrowInsRequest $request,
        EntrustThrowInsRepository $repository
    )
    {
        $res = $repository->survey($request);
        return $this->sendResponse($res, '回访状态修改成功');
    }

    public function addGd
    (
        EntrustThrowInsRequest $request,
        EntrustThrowInsRepository $repository,
        HousesService $service
    )
    {
        $res = $repository->addGd($request, $service);
        if (!$res) return $this->sendError('工单添加失败');
        return $this->sendResponse($res, '工单添加成功');
    }

    //统计数据
    public function statistic
    (
        EntrustThrowInsRequest $request,
        StatisticsService $service
    )
    {
        $res = $service->statistic($request);
        return $this->sendResponse($res, '获取成功');
    }
    


}
