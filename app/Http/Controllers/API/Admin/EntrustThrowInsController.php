<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\EntrustThrowInsRequest;
use App\Repositories\EntrustThrowInsRepository;
use App\Services\HousesService;
use App\Services\StatisticsService;
use App\User;

class EntrustThrowInsController extends APIBaseController
{
    public function index
    (
        EntrustThrowInsRequest $request,
        EntrustThrowInsRepository $repository
    )
    {
        //投放、委托列表
        $res = $repository->getList($request);
        return $this->sendResponse($res, '列表获取成功');
    }

    //添加新记录
    public function store
    (
        EntrustThrowInsRequest $request,
        EntrustThrowInsRepository $repository
    )
    {
        //房源投放、委托找房
        $res = $repository->add($request);
        if (!$res) return $this->sendError('失败');
        return $this->sendResponse($res, '成功');
    }

    public function export
    (
        EntrustThrowInsRequest $request,
        StatisticsService $service
    )
    {
        $res = $service->statistic($request);
        array_unshift($res['all'], '全部');
        array_unshift($res['throw'], '投放房源');
        array_unshift($res['entrust'], '委托找房');
        $data = [
            ['渠道类别', '400电话', '官网客服', '百度信息流', '今日头条信息流', 'APP', 'PC', '微信', '小程序', '58同城'],
            $res['all'],  $res['throw'],  $res['entrust'], ['企业服务', '其他'], [$res['service'], $res['other']]
        ];
        \Excel::create('统计数据表', function($excel) use ($data) {
            $excel->sheet('score', function($sheet) use ($data) {
                $sheet->rows($data);
            });
        })->export('xls');
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
        $openid = User::where('id', $request->shopkeeper_id)->value('openid');
        //发送消息
        $repository->send($openid, $request->name, $request->tel);
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

    //渠道来源构成数据
    public function constituteData
    (
        EntrustThrowInsRequest $request,
        StatisticsService $service
    )
    {
        $res = $service->constituteData($request);
        return $this->sendResponse($res, '获取成功');
    }

    public function conversionRate
    (
        EntrustThrowInsRequest $request,
        StatisticsService $service
    )
    {
        $res = $service->conversionRate($request);
        return $this->sendResponse($res, '获取成功');
    }
    
}
