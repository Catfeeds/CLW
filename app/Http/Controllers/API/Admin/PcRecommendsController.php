<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\PcRecommendsRequest;
use App\Models\PcRecommend;
use App\Repositories\PcRecommendsRepository;
use App\Handler\Common;

class PcRecommendsController extends APIBaseController
{
    // pc端精品推荐列表
    public function index(
        PcRecommendsRepository $repository
    )
    {
        if (empty(Common::user()->can('Pc_recommends_list'))) {
            return $this->sendError('无Pc_recommends_list权限','403');
        }
        $res = $repository->pcRecommendsList();
        return $this->sendResponse($res,'pc端精品推荐列表获取成功');
    }

    // 添加pc端精品推荐
    public function store(
        PcRecommendsRequest $request,
        PcRecommendsRepository $repository
    )
    {
        if (empty(Common::user()->can('add_pc_recommends'))) {
            return $this->sendError('无add_pc_recommends权限','403');
        }
        $res = $repository->addPcRecommends($request);
        return $this->sendResponse($res,'添加pc端精品推荐成功');
    }

    // 修改pc端精品推荐原始数据获取
    public function edit(
        PcRecommend $pcRecommend
    )
    {
        return $this->sendResponse($pcRecommend, '修改pc端精品推荐原始数据获取成功');
    }

    // 修改pc端精品推荐
    public function update(
        PcRecommendsRequest $request,
        PcRecommend $pcRecommend,
        PcRecommendsRepository $repository
    )
    {
        if (empty(Common::user()->can('update_pc_recommends'))) {
            return $this->sendError('无update_pc_recommends权限','403');
        }
        $res = $repository->updatePcRecommends($request, $pcRecommend);
        if (empty($res)) return $this->sendError('修改pc端精品推荐信息失败');
        return $this->sendResponse($res,'修改pc端精品推荐信息成功');
    }

    // 删除pc端精品推荐信息
    public function destroy(
        PcRecommend $pcRecommend
    )
    {
        if (empty(Common::user()->can('del_pc_recommends'))) {
            return $this->sendError('无del_pc_recommends权限','403');
        }
        if (empty($res = $pcRecommend->delete())) return $this->sendError('删除pc端精品推荐信息失败');
        return $this->sendResponse($res,'删除pc端精品推荐信息成功');
    }

}
