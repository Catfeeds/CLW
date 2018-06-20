<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class EmployeesRepository extends Model
{
    //员工列表
    public function getList($request)
    {
        return Employee::paginate($request->per_page);
    }

    //修改员工
    public function updateEmployee($employee, $request)
    {
        $employee->name = $request->name;
        $employee->tel = $request->tel;
        $employee->email = $request->email;
        if (!$employee->save()) return false;
        return true;
    }

    //添加员工
    public function addEmployee($request)
    {
        return Employee::create([
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'openid' => $request->openid,
        ]);
    }

    //换绑微信
    public function updateWechat($request)
    {
        return  Employee::where('id', $request->id)->update(['openid' => $request->openid]);
    }
}