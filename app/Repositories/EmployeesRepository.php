<?php

namespace App\Repositories;

use App\Models\Employee;
use App\User;
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
        $employee->openid = $request->openid;
        if (!$employee->save()) return false;
        return true;
        $this->syncOpenid($request->tel,$request->openid);
        return $employee;
    }

    //添加员工
    public function addEmployee($request)
    {
        $employee =  Employee::create([
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'openid' => $request->openid,
        ]);
        $this->syncOpenid($employee->tel, $employee->openid);
        return $employee;
    }

    //换绑微信
    public function updateWechat($request)
    {
        Employee::where('id', $request->id)->update(['openid' => $request->openid]);
        $res = Employee::where('id',$request->id)->first();
        $this->syncOpenid($res->tel,$res->openid);
        return $res;
    }

   //同步微信id
    public function syncOpenid($tel,$openid)
    {
       $user = User::where('tel',$tel)->first();
       if(!empty($user)) {
           return User::where('tel',$tel)->update(['openid'=>$openid]);
       }
    }
}