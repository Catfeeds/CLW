<?php

namespace App\Services;


use App\Models\Agent;
use App\Models\CompanyFramework;

class WorkOrdersService
{
    // 发送工单消息
    public function send($openid, $identifier, $demand, $remark, $time, $guid, $title = "新客户提醒")
    {
        $data['openid'] = json_encode(array($openid));
        $data['identifier'] = $identifier;
        $data['demand'] = $demand;
        $data['remark'] = $remark;
        $data['time'] = $time;
        $data['guid'] = $guid;
        $data['title'] = $title;
        return curl(config('setting.wechat_url').'/work_order_notice','post', $data);
    }

    // 获取给人员分配工单下拉数据
    public function getAllDistribution()
    {
        $res = Agent::with('company')
                    ->where(['status' => 1, 'start_up' => 1])
                    ->where('openid','!=','')
                    ->where('work_order','!=','')
                    ->get();
        return $res->map(function ($v){
            return [
                'value' => $v->guid,
                'label' => $v->name . '-' . $v->work_order_cn . '-' . $v->company->name
            ];
        });
    }

    // 管理层获取下级
    public function getAgent($guid)
    {
        $user = Agent::where('guid', $guid)->first();
        $res = Agent::with('role', 'companyFramework')
                    ->where('openid', '!=', '')
                    ->where(['start_up' => 1, 'status' => 1, 'company_guid' => $user->company_guid]);
        // 如果没有归属,查全公司员工
        if (empty($user->rel_guid)) {
            $res = $res->where('rel_guid', '!=', '');
        } else {
            // 如果有归属, 则查询全部下级归属
            $pid = array($user->rel_guid);
            while ($pid) {
                $data[] = $pid;
                $pid = CompanyFramework::whereIn('parent_guid', $pid)->pluck('guid')->toarray();
            }
            $res = $res->where('guid', '!=', '')
                       ->whereIn('rel_guid', collect($data)->flatten()->toArray());

        }
        $res = $res->where('guid', '!=', $guid)->orderBy('rel_guid')->get();
        return $res->map(function ($v) {
            return [
                'label' => $v->name. '-'. $v->companyFramework->name. '-'. $v->role->name,
                'value' => $v->guid,
            ];
        });
    }

    // 获取经纪人openid
    public function getOpenid($guid)
    {
        return Agent::where('guid', $guid)->value('openid');
    }
    
}