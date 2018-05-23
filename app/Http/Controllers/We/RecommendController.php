<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Models\Recommend;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use Illuminate\Http\Request;

class RecommendController extends Controller
{
    /**
     * 说明: 首页点击精品推荐跳转楼盘列表
     *
     * @param BuildingsRepository $repository
     * @param Recommend $recommend
     * @param BuildingsService $service
     * @param Request $request
     * @return mixed
     * @author 刘坤涛
     */
    public function show
    (
        BuildingsRepository $repository,
        Recommend $recommend,
        BuildingsService $service,
        Request $request
    )
    {
        $res = $repository->buildingList($request, $service, $recommend->building_id);
        return view('we.recommend')->with('data', $res);
    }
}