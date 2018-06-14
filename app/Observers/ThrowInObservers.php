<?php

namespace App\Observers;

use App\Http\Controllers\API\Admin\WechatController;
use App\Models\Employee;
use App\Models\ThrowIn;
use App\Models\AcceptMessage;

class ThrowInObservers {

    public function created(ThrowIn $throwIn)
    {
//        $data = array(
//            'first' => '您好，收到一条新委托',
//            'keyword1' => $throwIn->appellation?$throwIn->appellation : '无' ,
//            'keyword2' => $throwIn->tel? $throwIn->tel : '无',
//            'remark'   => '请及时联系客户!'
//        );
        $url= 'http://www.baidu.com';
        $data = array(
            'first' => array('您好,您有新的客户', '#555555'),
            'keyword1' => array('贾','#336699') ,
            'keyword2' => array('110','#ff0000'),
            'keyword3' => array('写字楼租赁','#888888'),
            'keyword4' => array(date('Y-m-d H:i:s',time()),'#888888'),
            'remark'   => array('感谢您的使用','#5599ff')
        );
        //查询出来该类型的消息需要发送那些人
//        $admin_id = AcceptMessage::where('type', 2)->pluck('employee_id')->toArray();
//        //关联admin表获取openid
//        $open_id = Employee::whereIn('id', $admin_id)->pluck('open_id')->toArray();
        //微信发送消息服务
        $wechat = new WechatController();
//        $messageId = $wechat->send($open_id,$data,'4clBX-HDEngochzcEQ9s5nFbX77JxXm1MCbCS7g4R2A');
        $messageId = $wechat->send('oPRyPwyGIy7pf2Ei-xG1lNjHdmo4',$data,$url,'OPENTM405824057');
        \Log::info($messageId);

    }
}