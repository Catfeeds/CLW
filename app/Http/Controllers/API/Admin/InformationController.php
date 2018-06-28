<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\InformationRequest;
use App\Models\Information;
use App\Repositories\InformationRepository;

class InformationController extends APIBaseController
{
    public function index(
        InformationRepository $repository
    )
    {
        $res = $repository->informationList();
        return $this->sendResponse($res, '获取资讯列表数据成功');
    }

    public function store(
        InformationRequest $request,
        InformationRepository $repository
    )
    {
        $res = $repository->addInformation($request);
        return $this->sendResponse($res,'添加资讯成功');
    }

    public function edit(
        Information $information
    )
    {
        return $this->sendResponse($information, '获取资讯修改前原始数据成功');
    }

    public function update(
        InformationRequest $request,
        Information $information,
        InformationRepository $repository
    )
    {
        $res = $repository->updateInformation($request, $information);
        return $this->sendResponse($res,'资讯修改成功');
    }

    public function destroy(
        Information $information
    )
    {
        $res = $information->delete();
        return $this->sendResponse($res,'资讯删除成功');
    }

    public function setTop(
        $id,
        InformationRepository $repository
    )
    {
        $res = $repository->setTop($id);
        return $this->sendResponse($res, '置顶成功');
    }

    public function delTop(
        $id,
        InformationRepository $repository
    )
    {
        $res = $repository->delTop($id);
        return $this->sendResponse($res, '取消置顶成功');
    }
}