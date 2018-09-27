<?php

namespace App\Services;

use App\Models\Agent;
use App\Models\CompanyFramework;
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
            if (!empty($v->house) && !empty($v->staffUser) ) $v->status = $v->staffUser->real_name.'已录入系统,房源编号'.$v->house->house_identifier;
            if (!empty($v->custom) && !empty($v->staffUser)) $v->status = $v->staffUser->real_name.'已录入系统,客源编号'.$v->custom->id;
        }
        return $item;
    }

    //店长处理页面信息 (手机端)
    public function getInfo($item)
    {
        foreach ($item as $v) {
            $v->staff = $v->staffUser->name;
            $staff_deal = WorkOrder::where('guid', $v->guid)->value('staff_deal');
            if (!$staff_deal) {
                $v->determine = 1; //未确定
            } else {
                $v->determine = 2; //已确定
            }
            if ($v->feedback) $v->determine = 3; //已反馈
        }
        return $item;
    }

    // 是否录入系统
    public function getStaffInfo($item)
    {
        foreach ($item as $v) {
            if (!empty($v->custom)) $v->entry = true;
            if (!empty($v->house)) $v->entry = true;
        }
        return $item;
    }

    // 获取转换率
    public function getConversionRate($model)
    {
        $rawCustoms = $model->get();

        $count = 0;
        foreach ($rawCustoms as $v) {
            if (!empty($v->custom)) $count++;
            if (!empty($v->house)) $count++;
        }

        // 返回百分比
        if (!empty($count) && !empty($rawCustoms->count())) {
            $res = round($count / $rawCustoms->count(),3) * 100 . '%';
            return $res;
        } else {
            return '0%';
        }
    }

    // 添加工单获取店长以上人员
    public function getShopkeeper()
    {
        $res = Agent::where('company_guid','8ec4af64c08e11e8ace2080027686836')->where('openid', '!=', '')->whereHas('role', function ($query) {
            $query->whereIn('level', [1,2,3]);
        })->get();
        return $res->map(function($v) {
            return [
                'label' => $v->name,
                'value' => $v->guid
            ];
        });
    }

    // 通过openid 获取经纪人guid
    public function getGuid($openid)
    {
        return Agent::where('openid', $openid)->value('guid');
    }

    // 通过guid获取经纪人openid
    public function getOpenid($guid)
    {
        return Agent::where('guid', $guid)->value('openid');
    }
    
    // 通过组织架构guid  查询全部下架 
    public function getFramework(array $guid)
    {
        while (count($guid)) {
            $data[] = $guid;
            $guid = CompanyFramework::whereIn('parent_guid', $guid)->pluck('guid')->toArray();
        }
        return collect($data)->flatten();
    }


    // 手机页面  获取店长下面的业务员
    public function getStaff($guid)
    {
        $user = Agent::where('guid', $guid)->first();
        // 同公司 openid不为空的人员
        $res = Agent::where('company_guid', $user->company_guid)->where('openid', '!=', '');
        // 判断用户角色等级
        switch ($user->role->level) {
            case 1:
                // 如果是总经理等级 查询全部人员(级别是组长和经纪人的)
                $res = $res->whereHas('role', function($query) {
                    $query->whereIn('level', [4,5]);
                })->get();
                break;
            case 2:
                // 如果是区域经理 查询该区域下的全部人员
                $framework = $this->getFramework(array($user->rel_guid));
                $res = $res->whereIn('rel_guid', $framework)->whereHas('role', function($query) {
                    $query->whereIn('level', [4,5]);
                })->get();
                break;
            case 3:
                // 如果是店长 查询该店下的全部人员
                $framework = $this->getFramework(array($user->rel_guid));
                $res = $res->whereIn('rel_guid', $framework)->whereHas('role', function($query) {
                    $query->whereIn('level', [4,5]);
                })->get();
                break;
                default;
                break;
        }
        return $res->map(function($v) {
            return [
                'label' => $v->name,
                'value' => $v->guid
            ];
        });
    }
}