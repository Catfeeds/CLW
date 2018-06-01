<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\AcceptMessagesRequest;
use App\Repositories\AcceptMessagesRepository;

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

    public function getSelectUsers()
    {
       $res = $this->repo->getSelectUsers();
       return $this->sendResponse($res, '后台管理人员数据');
    }


    public function index()
    {
        $res= $this->repo->messageList();
        return $this->sendResponse($res,'获取成功');
    }


    public function store()
    {
        $res = $this->repo->addAcceptMessage($this->req);
        return $this->sendResponse($res, '设置成功');
    }

}
