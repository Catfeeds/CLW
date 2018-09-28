<?php

namespace App\Services;


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

}