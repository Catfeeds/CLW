<?php

namespace App\Http\Controllers\API\Admin;

use App\Handler\Common;
use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\AcceptMessagesRequest;
use App\Models\AcceptMessage;
use App\Models\Employee;
use App\Repositories\AcceptMessagesRepository;
use App\Services\MessagesService;

class AcceptMessagesController extends APIBaseController
{
    protected $repo;
    protected  $req;
    public function __construct
    (
        AcceptMessagesRepository $repository,
        AcceptMessagesRequest $request
    )
    {
        $this->repo = $repository;
        $this->req = $request;
    }

    //员工数据
    public function getSelectUsers(MessagesService $service)
    {
        $res = $service->getSelectUsers();
        return $this->sendResponse($res, '员工下拉数据');
    }

    public function getBinding($type, MessagesService $service)
    {
        $res= $service->getBinding($type);
        return $this->sendResponse($res,'获取成功');
    }

    //消息接收人员列表
    public function index(MessagesService $service)
    {
        $res= $this->repo->messageList($this->req, $service);
        return $this->sendResponse($res,'获取成功');
    }

    //添加消息接收人员
    public function store(MessagesService $service)
    {
        $res = $this->repo->addAcceptMessage($this->req, $service);
        return $this->sendResponse($res, '设置成功');
    }

    //删除消息接收人员
    public function destroy()
    {
        $res = AcceptMessage::where(['type' => $this->req->type,'employee_id' => $this->req->employee_id])->delete();
        return $this->sendResponse($res,'删除成功');
    }

    //获取员工openid
    public function getOpenid($type)
    {
        $employee_id = AcceptMessage::where('type',$type)->pluck('employee_id')->toArray();
        if (!empty($employee_id)) {
            $openid = Employee::whereIn('id', $employee_id)->pluck('openid')->toArray();
        }
        if (!empty($openid)) return $openid;
        return '';
    }

}
