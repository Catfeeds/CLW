<?php
namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Models\PcRecommend;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use Illuminate\Http\Request;

class PcRecommendsController extends Controller
{
    // 首页点击精品推荐跳转楼盘列表
    public function show
    (
        BuildingsRepository $repository,
        PcRecommend $pcRecommend,
        BuildingsService $service,
        Request $request
    )
    {
        $res = $repository->buildingList($request, $service, $pcRecommend->building_guid,true);
        return view('home.home_topic', [
            'res' => $res,
            'pcRecommend' => $pcRecommend
        ]);
    }
}