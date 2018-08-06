<?php

namespace App\Services;

use App\Models\AcceptMessage;
use App\Models\Employee;

class MessagesService
{
    // 员工下拉数据
    public function getSelectUsers()
    {
        return Employee::all()->map(function($v) {
            return [
                'label' => $v->name,
                'value' => $v->id,
            ];
        });
    }

    // 查询类型下已经绑定的人员
    public function getBinding($type)
    {
        $id = $this->getBindingArr($type);
        return Employee::whereIn('id', $id)->pluck('id')->toArray();
    }

    // 获取绑定人员数组
    public function getBindingArr($type)
    {
        return  AcceptMessage::where('type', $type)->pluck('employee_id')->toArray();
    }

}