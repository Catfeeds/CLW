<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\RecommendsRepository;

class RecommendsController extends APIBaseController
{
    /**
     * 说明: 获取精品推荐列表
     *
     * @param RecommendsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function index
    (
        RecommendsRepository $repository
    )
    {
        $res = $repository->recommendsList();
        return $this->sendResponse($res,'精品推荐列表获取成功');
    }
}