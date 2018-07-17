<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\EmployeesRequest;
use App\Models\Employee;
use App\Repositories\EmployeesRepository;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Handler\Common;


class EmployeesController extends APIBaseController
{
    //员工列表
    public function index
    (
        EmployeesRequest $request,
        EmployeesRepository $repository
    )
    {
        if (empty(Common::user()->can('employees_list'))) {
            return $this->sendError('无employees_list权限','403');
        }
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
        if (empty(Common::user()->can('add_employees'))) {
            return $this->sendError('无add_employees权限','403');
        }
        //判断是否已经绑定
        $employee = Employee::where('tel', $request->tel)->orWhere('openid', $request->openid)->first();
        if ($employee) return $this->sendError('请勿重复绑定');
        $res = $repository->addEmployee($request);
        if (!$res) return $this->sendResponse($res,'绑定失败');
        return $this->sendError('绑定成功');
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
        if (empty(Common::user()->can('update_employees'))) {
            return $this->sendError('无update_employees权限','403');
        }
        $res = $repository->updateEmployee($employee, $request);
        return $this->sendResponse($res,'修改成功');
    }

    public function updateWechat
    (
        EmployeesRequest $request,
        EmployeesRepository $repository
    )
    {
        $employee = Employee::where('openid', $request->openid)->first();
        if ($employee) return $this->sendError('请勿重复绑定');
        $res = $repository->updateWechat($request);
        if (!$res) return $this->sendError('换绑失败');
        return $this->sendResponse($res,'换绑成功');
    }

    //解除绑定
    public function destroy(Employee $employee)
    {
        if (empty(Common::user()->can('del_employees'))) {
            return $this->sendError('无del_employees权限','403');
        }
        $res = $employee->delete();
        return $this->sendResponse($res,'删除成功');
    }



    //通过电话获取openid
    public function getOpenidByTel(EmployeesRequest $request)
    {
        $res = Employee::where('tel', $request->tel)->value('openid');
        return $this->sendResponse($res,'获取成功');
    }
    
}
