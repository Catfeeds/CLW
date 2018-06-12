<?php

namespace App\Observers;

use App\Http\Controllers\API\Admin\WechatController;
use App\Models\Employee;
use App\Models\ThrowIn;
use App\Models\AcceptMessage;

class ThrowInObservers {

    public function created(ThrowIn $throwIn)
    {
        $data = array(
            'first' => '您好，收到一条新委托',
            'keyword1' => $throwIn->appellation?$throwIn->appellation : '无' ,
            'keyword2' => $throwIn->tel? $throwIn->tel : '无',
            'remark'   => '请及时联系客户!'
        );
        //查询出来该类型的消息需要发送那些人
        $admin_id = AcceptMessage::where('type', 2)->pluck('employee_id')->toArray();
        //关联admin表获取openid
        $open_id = Employee::whereIn('id', $admin_id)->pluck('open_id')->toArray();
        //微信发送消息服务
        $wechat = new WechatController();
        $messageId = $wechat->send($open_id,$data,'4clBX-HDEngochzcEQ9s5nFbX77JxXm1MCbCS7g4R2A');
        \Log::info($messageId);

    }
}