<?php

namespace App\Observers;

use App\Models\ThrowIn;
use App\Http\Controllers\API\Admin\AcceptMessagesController;
use App\Http\Requests\Admin\AcceptMessagesRequest;
use App\Repositories\AcceptMessagesRepository;

class ThrowInObservers {

    public function created(ThrowIn $throwIn)
    {
        $class = new AcceptMessagesController(new AcceptMessagesRepository(),new AcceptMessagesRequest());
        $openid = $class->getOpenid(2);
        $name= $throwIn->appellation?$throwIn->appellation:'无';
        $tel = $throwIn->tel;
        $data['name'] = $name;
        $data['tel'] = $tel;
        if (!empty($openid)) {
            $data['openid'] = json_encode($openid);
            curl(config('setting.wechat_url').'/throw_in_notice','post',$data);
        }
    }
}