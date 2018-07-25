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
        $name= $entrustThrowIn->appellation?$entrustThrowIn->appellation:'无';
        $tel = $entrustThrowIn->tel;
        $data['name'] = $name;
        $data['tel'] = $tel;
        $openid = $class->getOpenid($entrustThrowIn->type);
        if (!empty($openid)) {
            $data['openid'] = json_encode($openid);

            //如果是投放房源
            if ($entrustThrowIn->type == 2) {
                curl(config('setting.wechat_url').'/throw_in_notice','post',$data);
            }

            //如果是委托找房
            if ($entrustThrowIn->type == 1) {
                curl(config('setting.wechat_url').'/bespeak_notice','post',$data);
            }
        }
    }
}