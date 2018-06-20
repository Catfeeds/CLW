<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\EmployeesRequest;
use App\Models\Employee;
use App\Repositories\EmployeesRepository;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class EmployeesController extends APIBaseController
{
    //员工列表
    public function index
    (
        EmployeesRequest $request,
        EmployeesRepository $repository
    )
    {
        $res = $repository->getList($request);
        return $this->sendResponse($res, '员工列表获取成功');
    }

    //生成带参数的二维码
    public function code(EmployeesRequest $request)
    {
        if ($request->status == 'add') {
            $url = config('setting.wechat_url') . '/oauth_wechat?redirectUrl=binding_wechat?param=name='
                . $request->name . ';tel='
                . $request->tel . ';email='
                . $request->email;
        }
        if ($request->status == 'update') {
            $url = config('setting.wechat_url') . '/oauth_wechat?redirectUrl=update_wechat?param=id='
                . $request->id;
        }
        $res =  QrCode::encoding('UTF-8')->size(300)->generate($url);
        return $this->sendResponse($res, '获取成功');
    }
    
    
    //微信绑定
    public function store
    (
        EmployeesRequest $request,
        EmployeesRepository $repository
    )
    {
        $data = $request->data;
        //判断是否已经绑定
        $employee = Employee::where('tel', $data['tel'])->orWhere('openid', $data['openid'])->first();
        if ($employee) return $this->sendError('已绑定,请勿重复绑定');
        $res = $repository->addEmployee($data);
        return $res;
    }


    //修改员工之前数据
    public function edit(Employee $employee)
    {
        return $this->sendResponse($employee, '员工修改之前原始数据');
    }

    //修改员工信息
    public function update
    (
        Employee $employee,
        EmployeesRequest $request,
        EmployeesRepository $repository
    )
    {
        $res = $repository->updateEmployee($employee, $request);
        return $this->sendResponse($res,'修改成功');
    }

    public function updateWechat
    (
        EmployeesRequest $request,
        EmployeesRepository $repository
    )
    {
        $res = $repository->updateWechat($request);
        return $res;
    }

    //解除绑定
    public function destroy(Employee $employee)
    {
        $res = $employee->delete();
        return $this->sendResponse($res,'删除成功');
    }
    
}
