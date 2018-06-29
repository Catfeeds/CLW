<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\BlocksRequest;
use App\Models\Block;
use App\Repositories\BlockLocationsRepository;
use App\Repositories\BlocksRepository;
use App\Services\BlocksService;
use Illuminate\Http\Request;

class BlocksController extends APIBaseController
{
    // 商圈列表
    public function index(
        Request $request,
        BlocksRepository $repository
    )
    {
        $res = $repository->blockList();
        return $this->sendResponse($res,'商圈列表获取成功');
    }

    // 添加商圈
    public function store(
        BlocksRequest $request,
        BlocksRepository $repository
    )
    {
        $res = $repository->addBlock($request);
        return $this->sendResponse($res,'商圈添加成功');
    }

    // 获取修改商圈前原始数据
    public function edit(
        Block $block
    )
    {
        if (!empty($block->blockLocation)) {
            $block->blockLocationId = $block->blockLocation->id;   // 商圈基础地理位置
        }
        $block->city_id = $block->area->city->id;
        return $this->sendResponse($block,'获取修改商圈前原始数据成功');
    }

    // 修改商圈
    public function update(
        BlocksRequest $request,
        Block $block,
        BlocksRepository $repository
    )
    {
        $res = $repository->updateBlock($request, $block);
        if (empty($res)) return $this->sendError('商圈修改失败');
        return $this->sendResponse($res,'商圈修改成功');
    }

    // 删除商圈
    public function destroy(
        Block $block
    )
    {
        // 判断商圈下是否有楼盘数据
        if (!empty($block->building->count())) return $this->sendError('商圈下有楼盘,删除失败');

        if (empty($res = $block->delete())) return $this->sendError('商圈删除失败');
        return $this->sendResponse($res,'商圈删除成功');
    }

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

    // 商圈添加推荐
    public function addRecommend(
        $id,
        BlocksRequest $request,
        BlocksRepository $repository
    )
    {
        $res = $repository->addRecommend($id, $request);
        return $this->sendResponse($res, '操作成功');
    }

    // 获取所有商圈基础地理位置
    public function blockLocations(
        BlockLocationsRepository $repository
    )
    {
        $res = $repository->blockLocations();
        return $this->sendResponse($res,'获取所有商圈基础地理位置成功');
    }

}