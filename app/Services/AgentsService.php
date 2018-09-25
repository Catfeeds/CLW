<?php

namespace App\Services;

use App\Models\Agent;

class AgentsService
{
    // 获取店长以上人员
    public function getUSer()
    {
        $res = Agent::where('company_guid','8ec4af64c08e11e8ace2080027686836')->where('openid', '!=', '')->whereHas('role', function ($query) {
            $query->whereIn('level', [1,2,3]);
        })->get();
        return $res->map(function($v) {
           return [
               'label' => $v->name,
               'value' => $v->guid,
               'openid' => $v->openid
           ];
        });
    }
}