<?php

namespace App\Observers;

use App\Http\Controllers\API\Admin\WechatController;
use App\Models\AcceptMessage;
use App\Models\Bespeak;
use App\Models\Employee;

class BespeakObservers {

    public function created(Bespeak $bespeak)
    {
        $data = array(
            'first' => '你好，有客户预约看房',
            'keyword1' => $bespeak->appellation?$bespeak->appellation : '无' ,
            'keyword2' => $bespeak->tel? $bespeak->tel : '无',
            'keyword3' => $bespeak->demand ?  $bespeak->demand : '无',
            'remark'   => '请及时联系客户!'
        );
        //查询出来该类型的消息需要发送那些人
        $admin_id = AcceptMessage::where('type', 1)->pluck('employee_id')->toArray();
        //关联admin表获取openid
        $open_id = Employee::whereIn('id', $admin_id)->pluck('open_id')->toArray();
        //微信发送消息服务
        $wechat = new WechatController();
            $messageId = $wechat->send($open_id,$data,'uZq6UGRezIsVhX-jqLsBWM7uxTZTnnfuPOHFp0Py_WA');
            \Log::info($messageId);

    }
}