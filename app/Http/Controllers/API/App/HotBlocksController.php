<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\HotBlocksRepository;

class HotBlocksController extends APIBaseController
{
    /**
     * 说明: 获取商圈列表(按sort字段排序)
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
}