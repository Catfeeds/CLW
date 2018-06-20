<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\MessageTypesRequest;
use App\Models\MessageType;
use App\Repositories\MessageTypesRepository;

class MessageTypesController extends APIBaseController
{
    //消息列表
    public function index
    (
        MessageTypesRepository $repository,
        MessageTypesRequest $request
    )
    {
        $res = $repository->getList($request);
        return $this->sendResponse($res, '消息列表获取成功');
    }

    //添加消息
    public function store
    (
        MessageTypesRepository $repository,
        MessageTypesRequest $request
    )
    {
        $res = $repository->addMessage($request);
        return $this->sendResponse($res,'消息添加成功');
    }

    //编辑消息数据
    public function edit(MessageType $messageType)
    {
        return $this->sendResponse($messageType,'消息修改原始数据');
    }

    //修改消息
    public function update
    (
        MessageType $messageType,
        MessageTypesRepository $repository,
        MessageTypesRequest $request
    )
    {
        $res = $repository->updateMessage($messageType, $request);
        return $this->sendResponse($res, '消息修改成功');
    }

    //删除消息
    public function destroy(MessageType $messageType)
    {
        $res = $messageType->delete();
        return $this->sendResponse($res,'删除成功');
    }
}
