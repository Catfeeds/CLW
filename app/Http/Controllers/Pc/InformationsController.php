<?php

namespace App\Http\Controllers\PC;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Repositories\InformationRepository;

class InformationsController extends Controller
{
    // 资讯列表
    public function index
    (
        InformationRepository $repository
    )
    {
        $top = $repository->carousel(); // 轮播图
        $hot = $repository->hotInformation(); // 热点
        $content = $repository->getList();
        return view('home.information', ['contents' => $content, 'tops' => $top, 'hots' => $hot]);
    }

    // 资讯详情
    public function show
    (
        Information $information,
        InformationRepository $repository
    )
    {
        $hotInformation = $repository->hotInformation();
        $previous = $repository->previous($information->id);
        $next = $repository->next($information->id);
        return view('home.information_show',[
            'information' =>$information,
            'hots'=>$hotInformation,
            'previous' => $previous,
            'next' => $next
        ]);
    }
}
