<?php

namespace App\Services;

use App\Models\Agent;
use App\Models\WorkOrder;

class WorkOrdersService
{
    // 工单添加发送微信消息
    public function send($openid, $name, $tel, $staff = false)
    {
        $data['openid'] = json_encode(array($openid));
        $data['name'] = $name;
        $data['tel'] = $tel;
        $data['staff'] = $staff;
        return curl(config('setting.wechat_url').'/new_custom_notice','post', $data);
    }

    //获取工单列表相关信息
    public function getGdInfo($item)
    {
        foreach($item as $v) {
            if (!$v->shopkeeper_deal && !empty($v->shopkeeperUser)) $v->status = '已发送给组长'.'('.$v->shopkeeperUser->name.')';
            if ($v->staff_id && !empty($v->shopkeeperUser) && !empty($v->staffUser)) $v->status = '组长'.'('.$v->shopkeeperUser->name.')'.'已收到转交给'.$v->staffUser->name;
            if ($v->staff_deal && !empty($v->staffUser)) $v->status = $v->staffUser->name.'已收到';
//            if (!empty($v->house) && !empty($v->staffUser) ) $v->status = $v->staffUser->real_name.'已录入系统,房源编号'.$v->house->house_identifier;
//            if (!empty($v->custom) && !empty($v->staffUser)) $v->status = $v->staffUser->real_name.'已录入系统,客源编号'.$v->custom->id;
        }
        return $item;
    }

    //店长处理页面信息 (手机端)
    public function getInfo($item)
    {
        foreach ($item as $v) {
            $v->staff = $v->staffUser->real_name;
            $staff_deal = WorkOrder::where('id', $v->id)->value('staff_deal');
            if (!$staff_deal) {
                $v->determine = 1; //为确定
            } else {
                $v->determine = 2; //已确定
            }
            if ($v->feedback) $v->determine = 3; //已反馈
        }
        return $item;
    }

//    // 获取转换率
//    public function getConversionRate($model)
//    {
//        $rawCustoms = $model->get();
//
//        $count = 0;
//        foreach ($rawCustoms as $v) {
//            if (!empty($v->custom)) $count++;
//            if (!empty($v->house)) $count++;
//        }
//
//        // 返回百分比
//        if (!empty($count) && !empty($rawCustoms->count())) {
//            $res = round($count / $rawCustoms->count(),3) * 100 . '%';
//            return $res;
//        } else {
//            return '0%';
//        }
//    }

    // 通过openid 获取经纪人guid
    public function getGuid($openid)
    {
        return Agent::where('openid', $openid)->value('guid');
    }

    public function getStaff($guid)
    {
        $user = Agent::where('guid', $guid)->first();

        // 判断用户角色等级
        switch ($user->role->level) {
            case 1:
                // 如果是公司等级 查询全部人员(级别是组长和经纪人的)
                $res = Agent::where('company_guid', $user->company_guid)->whereHas('role', function($query) {
                    $query->whereIn('level', [4,5]);
                })->get();
                break;
            case 2:
                // 如果是区域经理 查询该区域下的全部人员

                break;
            case 3:
                // 如果是店长 查询该店下的全部人员
        }

    }
}