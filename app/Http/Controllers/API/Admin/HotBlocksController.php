<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\HotBlocksRequest;
use App\Models\HotBlock;
use App\Repositories\HotBlocksRepository;
use App\Services\BlocksService;
use App\Handler\Common;

class HotBlocksController extends APIBaseController
{
    /**
     * 说明: 热门商圈列表
     *
     * @param HotBlocksRepository $hotBlocksRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function index(
        HotBlocksRepository $hotBlocksRepository
    )
    {
        if (empty(Common::user()->can('hotBlocks_list'))) {
            return $this->sendError('无hotBlocks_list权限','403');
        }
        $result = $hotBlocksRepository->hotBlocksList();
        return $this->sendResponse($result, '热门商圈获取成功');
    }

    /**
     * 说明: 获取商圈信息
     *
     * @param BlocksService $blocksService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function create(
        BlocksService $blocksService
    )
    {
        $result = $blocksService->getAllBlocks();
        return $this->sendResponse($result->map(function($v) {
            return [
                'label' => $v->name,
                'value' => $v->id
            ];
        }), '获取商圈信息成功');
    }

    /**
     * 说明: 添加热门商圈
     *
     * @param HotBlocksRequest $request
     * @param HotBlocksRepository $hotBlocksRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        HotBlocksRequest $request,
        HotBlocksRepository $hotBlocksRepository
    )
    {
        if (empty(Common::user()->can('add_hot_blocks'))) {
            return $this->sendError('无add_hot_blocks权限','403');
        }
        $result = $hotBlocksRepository->addHotBlocks($request);
        return $this->sendResponse($result, '热门商圈添加成功');
    }

    /**
     * 说明: 热门商圈修改前原始数据
     *
     * @param HotBlock $hotBlock
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function edit(
        HotBlock $hotBlock
    )
    {
        return $this->sendResponse($hotBlock,'热门商圈原始数据');
    }

    /**
     * 说明: 修改热门商圈
     *
     * @param HotBlock $hotBlock
     * @param HotBlocksRequest $request
     * @param HotBlocksRepository $hotBlocksRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function update(
        HotBlock $hotBlock,
        HotBlocksRequest $request,
        HotBlocksRepository $hotBlocksRepository
    )
    {
        if (empty(Common::user()->can('update_hot_blocks'))) {
            return $this->sendError('无update_hot_blocks权限','403');
        }
        // 检测商圈是否重复
        if (!empty($request->block_id) && $request->block_id != $hotBlock->block_id && in_array($request->block_id, HotBlock::pluck('block_id')->toArray())) {
            return $this->sendError('已存在，请勿重复设置为热门商圈');
        }

        // 检测排序是否重复
        if (!empty($request->sort) && $request->sort != $hotBlock->sort && in_array($request->sort, HotBlock::pluck('sort')->toArray())) {
            return $this->sendError('排序请勿重复');
        }

        $result = $hotBlocksRepository->updateHotBlocks($request, $hotBlock);
        return $this->sendResponse($result, '热门商圈修改成功');
    }

    /**
     * 说明: 删除热门商圈
     *
     * @param HotBlock $hotBlock
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 罗振
     */
    public function destroy(
        HotBlock $hotBlock
    )
    {
        if (empty(Common::user()->can('del_hot_blocks'))) {
            return $this->sendError('无del_hot_blocks权限','403');
        }
        $result = $hotBlock->delete();
        return $this->sendResponse($result, '热门商圈删除成功');
    }
}