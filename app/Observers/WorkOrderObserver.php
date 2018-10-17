<?php

namespace App\Observers;

use App\Models\WorkOrder;
use App\Services\DingTalkService;

class WorkOrderObserver{

    // 监听创建工单
    public function created(WorkOrder $workOrder)
    {
        $service = new DingTalkService();
        $str = '新工单提醒'."\n　\n";
        $str .= '工单编号:'. $workOrder->gd_identifier."\n　\n";
        $str .= '客户姓名:'. $workOrder->name."\n　\n";
        $str .= '客户电话:'. $workOrder->tel."\n　\n";
        $str .= '开始时间:'. $workOrder->created_at->format('Y-m-d H:i:s')."\n　\n";
        $str .= '需求类型:'. $workOrder->demand_cn."\n　\n";
        $str .= '需求详情:'. $workOrder->remark."\n　\n";
        $str .= '请尽快处理';
        $data = $service->sendMessages($str);
        if (!$data) \Log::info('钉钉消息发送失败'.$workOrder->guid);
    }
}