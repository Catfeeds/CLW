<?php

namespace App\Observers;

use App\Http\Controllers\API\Admin\AcceptMessagesController;
use App\Http\Requests\Admin\AcceptMessagesRequest;
use App\Models\Bespeak;
use App\Repositories\AcceptMessagesRepository;

class BespeakObservers {

    public function created(Bespeak $bespeak)
    {
        $class = new AcceptMessagesController(new AcceptMessagesRepository(),new AcceptMessagesRequest());
        $openid = $class->getOpenid(1);
        $name= $bespeak->appellation?$bespeak->appellation:'无';
        $tel = $bespeak->tel;
        $data['openid'] = json_encode($openid);
        $data['name'] = $name;
        $data['tel'] = $tel;
        curl(config('setting.wechat_url').'/bespeak_notice','post',$data);
    }
}