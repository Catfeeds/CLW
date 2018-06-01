<?php

namespace App\Observers;

use App\Models\ThrowIn;
use App\Models\AcceptMessage;
use App\Models\Admin;

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
        $admin_id = AcceptMessage::where('type', 2)->pluck('admin_id')->toArray();
        //关联admin表获取openid
        $open_id = Admin::whereIn('id', $admin_id)->pluck('open_id')->toArray();
        //微信发送消息服务
        $notice = app('wechat')->notice;
        //循环发送
        foreach ($open_id as $v) {
            $messageId = $notice->to($v)->uses('4clBX-HDEngochzcEQ9s5nFbX77JxXm1MCbCS7g4R2A')->data($data)->send();
            \Log::info($messageId);
        }
    }
}