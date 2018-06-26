<?php

namespace App\Observers;

use App\Models\ThrowIn;
use App\Services\MessagesService;

class ThrowInObservers {

    public function created(ThrowIn $throwIn)
    {
        $class = new MessagesService();
        $openid = $class->getOpenid(1);
        $name= $throwIn->appappellation?$throwIn->appappellation:'无';
        $tel = $throwIn->tel;
        $data['openid'] = json_encode($openid);
        $data['name'] = $name;
        $data['tel'] = $tel;
        $res = curl(config('setting.wechat_url').'/throw_in_notice','post',$data);
        \Log::info($res);
    }
}