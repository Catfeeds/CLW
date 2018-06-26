<?php

namespace App\Observers;

use App\Models\Bespeak;
use App\Services\MessagesService;

class BespeakObservers {

    public function created(Bespeak $bespeak)
    {
        $class = new MessagesService();
        $openid = $class->getOpenid(1);
        $name= $bespeak->appappellation?$bespeak->appappellation:'无';
        $tel = $bespeak->tel;
        $data['openid'] = json_encode($openid);
        $data['name'] = $name;
        $data['tel'] = $tel;
        $res = curl(config('setting.wechat_url').'/bespeak_notice','post',$data);
        \Log::info($res);
    }
}