<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\InformationRequest;
use App\Models\Information;
use App\Repositories\InformationRepository;
use App\Services\InformationService;
use Illuminate\Http\Request;
use App\Handler\Common;

class InformationController extends APIBaseController
{
    public function index(
        InformationRepository $repository
    )
    {
        if (empty(Common::user()->can('information_list'))) {
            return $this->sendError('无information_list权限','403');
        }
        $res = $repository->informationList();
        return $this->sendResponse($res, '获取资讯列表数据成功');
    }

    public function store(
        InformationRequest $request,
        InformationRepository $repository
    )
    {
        if (empty(Common::user()->can('add_information'))) {
            return $this->sendError('无add_information权限','403');
        }
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
        if (empty(Common::user()->can('del_information'))) {
            return $this->sendError('无del_information权限','403');
        }
        $res = $information->delete();
        return $this->sendResponse($res,'资讯删除成功');
    }

    public function setTop(
        $id,
        InformationRepository $repository
    )
    {
        if (empty(Common::user()->can('set_top'))) {
            return $this->sendError('无set_top权限','403');
        }
        $res = $repository->setTop($id);
        return $this->sendResponse($res, '置顶成功');
    }

    public function delTop(
        $id,
        InformationRepository $repository
    )
    {
        if (empty(Common::user()->can('del_top'))) {
            return $this->sendError('无del_top权限','403');
        }
        $res = $repository->delTop($id);
        return $this->sendResponse($res, '取消置顶成功');
    }

    public function pickInformation(
        Request $request,
        InformationService $service
    )
    {
        $res = $service->pickInformation($request);
        if (empty($res['status'])) return $this->sendError($res['message']);
        return $this->sendResponse($res, '数据爬取成功');
    }
}