<?php

namespace App\Repositories;

use App\Models\AcceptMessage;
use App\Models\Admin;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class AcceptMessagesRepository extends Model
{

    //消息接受人员列表
    public function messageList($request)
    {
        //获取该类型下的人员id
        $id = AcceptMessage::where('type', $request->type)->pluck('employee_id')->toArray();
        //通过id获取员工
        return Employee::whereIn('id', $id)->paginate($request->per_page);
    }

    //添加消息接受人员
    public function addAcceptMessage($request)
    {
        $type = $request->type;
        foreach ($type as $v) {
            $res =  AcceptMessage::create([
                'type' => $v,
                'employee_id' => $request->employee_id
            ]);
        }
        return $res;
    }
}