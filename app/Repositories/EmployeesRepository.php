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
    public function addEmployee($data)
    {
        return Employee::insert($data);
    }

    public function updateWechat($data)
    {
        return Employee::where('id', $data['id'])->update(['openid',$data['openid']]);
    }
}