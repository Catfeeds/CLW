<?php

namespace App\Services;


use App\Models\AcceptMessage;
use App\Models\Employee;
use App\Models\MessageType;

class MessagesService
{


    //消息下拉数据
    public function getSelectType()
    {
        return MessageType::all()->map(function($v) {
            return [
                'label' => $v->name,
                'value' => $v->id,
            ];
        });
    }

    //员工下拉数据
    public function getSelectUsers()
    {
        return Employee::all()->map(function($v) {
            return [
                'label' => $v->name,
                'value' => $v->id,
            ];
        });
    }

    //获取员工openid
    public function getOpenid($type)
    {
        $employee_id = AcceptMessage::where('type',$type)->pluck('employee_id')->toArray();
        $openid = Employee::whereIn('id', $employee_id)->pluck('openid')->toArray();
        return $openid;
    }

    //获取某员工下没有绑定的消息类型
    public function getUnType($id)
    {
        //查询现在已经绑定的消息类型
        $type = AcceptMessage::where('employee_id', $id)->pluck('type')->toArray();
        //查询没有绑定的消息类型
        $res = MessageType::whereNotIn('id', $type)->get();
        return $res->map(function($v) {
           return [
               'label' => $v->name,
               'value' => $v->id,
           ];
        });

    }
}