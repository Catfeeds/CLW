<?php

namespace App\Repositories;

use App\Models\AcceptMessage;
use App\Models\Admin;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class AcceptMessagesRepository extends Model
{
    public function getSelectUsers()
    {
        return Employee::all()->map(function($v) {
            return [
                'label' => $v->id,
                'value' => $v->name,
            ];
        });
    }

    public function messageList()
    {
        return AcceptMessage::all();
    }

    //添加或修改接收人员
    public function addAcceptMessage($request)
    {
        //根据消息类型查询该类型的接收人员
        $admin = AcceptMessage::where('type', $request->type)->pluck('admin_id')->toArray();
        //如果$admin为空,说明该类型下没有接收人员,则添加
        if (!$admin) {
            foreach ($request->admin_id as $value) {
                $res = AcceptMessage::create([
                    'type' => $request->type,
                    'employee_id' => $value
                ]);
            }
        } else {
            if (!array_diff($admin, $request->admin_id)) return true;
            //如果不为空,则为修改
            //原数组减去当前数组,获得需要删除的人员
            $arr_del = array_diff($admin, $request->admin_id);
            foreach ($arr_del as $v) {
                AcceptMessage::where('employee_id', $v)->delete();
            }

            //当前数组减去原数组,获取新增人员
            $arr_add = array_diff($request->admin_id, $admin);
            foreach ($arr_add as $v) {
                $res = AcceptMessage::create([
                    'type' => $request->type,
                    'employee_id' => $v
                ]);
            }
        }
        return $res;
    }
}