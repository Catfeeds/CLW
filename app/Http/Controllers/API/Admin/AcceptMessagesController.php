<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\AcceptMessagesRequest;
use App\Models\AcceptMessage;
use App\Repositories\AcceptMessagesRepository;
use App\Services\MessagesService;
use function PHPSTORM_META\type;

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

    public function getUnType($id, MessagesService $service)
    {
        $res = $service->getUnType($id);
        return $this->sendResponse($res,'获取成功');
    }


    //消息数据
    public function getSelectType(MessagesService $service)
    {
       $res = $service->getSelectType();
       return $this->sendResponse($res, '消息下拉数据');
    }

    //员工数据
    public function getSelectUsers(MessagesService $service)
    {
        $res = $service->getSelectUsers();
        return $this->sendResponse($res, '员工下拉数据');
    }

    //消息接收人员列表
    public function index()
    {
        $res= $this->repo->messageList($this->req);
        return $this->sendResponse($res,'获取成功');
    }

    //添加消息接收人员
    public function store()
    {
        $res = $this->repo->addAcceptMessage($this->req);
        return $this->sendResponse($res, '设置成功');
    }

    //删除消息接收人员
    public function destroy()
    {
        $res = AcceptMessage::where(['type' => $this->req->type,'employee_id' => $this->req->employee_id])->delete();
        return $this->sendResponse($res,'删除成功');
    }

}
