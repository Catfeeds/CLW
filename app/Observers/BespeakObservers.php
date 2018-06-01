<?php

namespace App\Observers;

use App\Models\AcceptMessage;
use App\Models\Admin;
use App\Models\Bespeak;

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
        $admin_id = AcceptMessage::where('type', 1)->pluck('admin_id')->toArray();
        //关联admin表获取openid
        $open_id = Admin::whereIn('id', $admin_id)->pluck('open_id')->toArray();
        //微信发送消息服务
        $notice = app('wechat')->notice;
        //循环发送
        foreach ($open_id as $v) {
            $messageId = $notice->to($v)->uses('uZq6UGRezIsVhX-jqLsBWM7uxTZTnnfuPOHFp0Py_WA')->data($data)->send();
            \Log::info($messageId);
        }
    }
}