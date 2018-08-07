<?php

namespace App\Repositories;

use App\Models\AcceptMessage;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class AcceptMessagesRepository extends Model
{
    //消息接受人员列表
    public function messageList($request, $service)
    {
        //获取该类型下的人员id
        $id = $service->getBindingArr($request->type);
        //通过id获取员工
        return Employee::whereIn('id', $id)->paginate($request->per_page);
    }

    //添加消息接受人员
    public function addAcceptMessage($request, $service)
    {
        //查询已经绑定的人员
        $item = $service->getBindingArr($request->type);
        //传过来的数组减去已经绑定的数组,获得需要添加的人
        $add_user = array_diff($request->employee_id, $item);
        if (!empty($add_user)) {
            foreach ($add_user as $v) {
                $res =  AcceptMessage::create([
                    'type' => $request->type,
                    'employee_id' => $v
                ]);
            }
        }
        //绑定的数组减去传过来的数组,获取删除的人
        $del_user= array_diff($item,$request->employee_id);
        if (!empty($del_user)) {
            foreach ($del_user as $v) {
                $res = AcceptMessage::where([
                    'type' => $request->type,
                    'employee_id' => $v
                ])->delete();
            }
        }
        if (empty($add_user) && empty($del_user)) return true;
        return $res;
    }
}