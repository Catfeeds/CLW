<?php

namespace App\Services;


use App\Models\Agent;
use App\Models\CompanyFramework;

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

    // 获取给人员分配工单下拉数据
    public function getAllDistribution()
    {
        $res =Agent::with('company')
                    ->where(['status'=>1,'start_up'=>1,['openid', '!=', '']])
                    ->where('work_order','!=', '')
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
        $res = $res->orderBy('rel_guid')->get();
        return $res->map(function ($v) {
            return [
                'label' => $v->name. '-'. $v->companyFramework->name. '-'. $v->role->name,
                'value' => $v->guid,
            ];
        });
    }

}