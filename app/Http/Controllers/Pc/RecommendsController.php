<?php
namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Models\Recommend;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use Illuminate\Http\Request;

class RecommendsController extends Controller
{
    // 首页点击精品推荐跳转楼盘列表
    public function show
    (
        BuildingsRepository $repository,
        Recommend $recommend,
        BuildingsService $service,
        Request $request
    )
    {
        $res = $repository->buildingList($request, $service, $recommend->building_id,true);
        return view('home.home_topic', [
            'res' => $res,
            'recommend' => $recommend
        ]);
    }
}