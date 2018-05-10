<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Models\HotBlock;
use App\Repositories\HotBlocksRepository;
use App\Services\HotBlockService;

class HotBlocksController extends APIBaseController
{
    /**
     * 说明: 获取商圈列表(按sort字段排序)
     *
     * @param HotBlocksRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function index
    (
        HotBlocksRepository $repository
    )
    {
        $res =  $repository->hotBlocksList();
        return $this->sendResponse($res, '热门商圈获取成功');
    }

    /**
     * 说明: 获取热门商圈下楼盘数据成功
     *
     * @param HotBlock $hotBlock
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function show(
        HotBlock $hotBlock
    )
    {
        return $this->sendResponse($hotBlock->building, '获取热门商圈下楼盘数据成功');
    }


}