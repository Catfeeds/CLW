<?php

namespace App\Observers;

use App\Http\Controllers\API\Admin\AcceptMessagesController;
use App\Http\Requests\Admin\AcceptMessagesRequest;
use App\Models\EntrustThrowIn;
use App\Repositories\AcceptMessagesRepository;

class EntrustThrowInObservers {

    public function created(EntrustThrowIn $entrustThrowIn)
    {
        $class = new AcceptMessagesController(new AcceptMessagesRepository(),new AcceptMessagesRequest());
        $name= $entrustThrowIn->name?$entrustThrowIn->name:'无';
        $tel = $entrustThrowIn->tel;
        $data['name'] = $name;
        $data['tel'] = $tel;
        $data['remark'] = $entrustThrowIn->remark??'无';
        $openid = $class->getOpenid($entrustThrowIn->demand);
        if ($entrustThrowIn->page_source !== '管理系统') {
            if (!empty($openid)) {
                $data['openid'] = json_encode($openid);
                //如果是投放房源
                if ($entrustThrowIn->demand == 1) {
                    curl(config('setting.wechat_url').'/throw_in_notice','post',$data);
                }
                //如果是委托找房
                if ($entrustThrowIn->demand == 2) {
                    curl(config('setting.wechat_url').'/bespeak_notice','post',$data);
                }

                //如果是企业服务
                if ($entrustThrowIn->demand == 3) {
                    $openid = $class->getOpenid(4);
                    $data['openid'] = json_encode($openid);
                    curl(config('setting.wechat_url').'/service_notice','post',$data);
                }
            }
        }

    }
}