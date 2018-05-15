<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\BlocksRequest;
use App\Models\Block;
use App\Repositories\BlocksRepository;
use App\Services\BlocksService;

class BlocksController extends APIBaseController
{
    /**
     * 说明: 获取所有商圈
     *
     * @param BlocksService $blocksService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function allBuildingBlock(
        BlocksService $blocksService
    )
    {
        $result= $blocksService->allBuildingBlock();
        return $this->sendResponse($result,'所有商圈信息获取成功');
    }

    /**
     * 说明: 商圈添加推荐
     *
     * @param BlocksRequest $request
     * @param Block $block
     * @param BlocksRepository $blocksRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function update(
        BlocksRequest $request,
        Block $block,
        BlocksRepository $blocksRepository
    )
    {
        if (empty($res = $blocksRepository->updateRecommend($block, $request))) return $this->sendError('操作失败');

        return $this->sendResponse($res, '操作成功');


    }
}