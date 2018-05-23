<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Models\Recommend;
use App\Repositories\RecommendsRepository;

class RecommendController extends Controller
{

    /**
     * 说明：首页点击精品推荐跳转到楼盘列表
     *
     * @param RecommendsRepository $repository
     * @param Recommend $recommend
     * @return \Illuminate\Http\JsonResponse
     * @author jacklin
     */
    public function show
    (
        RecommendsRepository $repository,
        Recommend $recommend
    )
    {
        $res = $repository->getBuildingList($recommend->building_id);
        return view('we.recommed')->with('data', $res);
    }
}