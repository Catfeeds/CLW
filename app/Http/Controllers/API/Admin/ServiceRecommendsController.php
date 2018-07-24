<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\ServiceRecommendsRequest;
use App\Models\ServiceRecommend;
use App\Repositories\ServiceRecommendsRepository;
use App\Services\ServiceRecommendsService;
use App\Handler\Common;

class ServiceRecommendsController extends APIBaseController
{
    protected $repo;
    protected $req;
    public function __construct
    (
        ServiceRecommendsRepository $repository,
        ServiceRecommendsRequest $request
    )
    {
        $this->repo = $repository;
        $this->req = $request;
    }

    /**
     * 说明:
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index()
    {
        if (empty(Common::user()->can('service_recommends_list'))) {
            return $this->sendError('无推荐服务列表权限','403');
        }
        $res = $this->repo->serviceRecommendsList();
        return $this->sendResponse($res, '推荐服务列表获取成功');
    }

    /**
     * 说明:添加推荐服务
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function store()
    {
        if (empty(Common::user()->can('add_service_recommend'))) {
            return $this->sendError('无推荐服务添加权限','403');
        }
        // 如果添加的数据权重为1,判断权重为1的是否存在
        if ($this->req->weight == 1) {
            $weight = ServiceRecommend::where('weight', 1)->first();
            if ($weight) {
                return $this->sendError('不能添加权重为1的推荐服务');
            }
        }
        $res = $this->repo->addServiceRecommend($this->req);
        return $this->sendResponse($res, '推荐服务添加成功');
    }

    /**
     * 说明: 修改推荐服务之前原始数据
     *
     * @param ServiceRecommend $serviceRecommend
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function edit(ServiceRecommend $serviceRecommend)
    {
        return $this->sendResponse($serviceRecommend,'推荐服务修改之前原始数据');
    }

    /**
     * 说明: 修改推荐服务
     *
     * @param ServiceRecommend $serviceRecommend
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function update(ServiceRecommend $serviceRecommend)
    {
        if (empty(Common::user()->can('update_service_recommend'))) {
            return $this->sendError('无推荐服务修改权限','403');
        }
        // 检测服务是否重复
        if (!empty($this->req->service_id) && $this->req->service_id != $serviceRecommend->service_id && in_array($this->req->service_id, ServiceRecommend::pluck('service_id')->toArray())) {
            return $this->sendError('请勿重复设置推荐服务');
        }

        //判断能否更新权重为1
        if ($this->req->weight == 1 && $serviceRecommend->weight != 1) {
            $weight = ServiceRecommend::where('weight', 1)->first();
            if ($weight) {
                return $this->sendError('权重为1的推荐服务已存在,请勿重复修改');
            }
        }

        $res = $this->repo->updateServiceRecommend($this->req, $serviceRecommend);
        if(!$res) return $this->sendError('推荐服务修改失败');
        return $this->sendResponse($res,'推荐服务修改成功');
    }

    /**
     * 说明: 删除推荐服务
     *
     * @param ServiceRecommend $serviceRecommend
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 刘坤涛
     */
    public function destroy(ServiceRecommend $serviceRecommend)
    {
        if (empty(Common::user()->can('del_service_recommend'))) {
            return $this->sendError('无推荐服务删除权限','403');
        }
        $res = $serviceRecommend->delete();
        return $this->sendResponse($res,'推荐服务删除成功');
    }

    /**
     * 说明:获取服务下来数据
     *
     * @param ServiceRecommendsService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function serviceSelect
    (
        ServiceRecommendsService $service
    )
    {
        $res = $service->serviceSelect();
        return $this->sendResponse($res,'服务下拉数据获取成功');
    }
}
