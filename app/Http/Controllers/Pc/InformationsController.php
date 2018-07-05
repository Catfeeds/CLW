<?php

namespace App\Http\Controllers\PC;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Repositories\InformationRepository;

class InformationsController extends Controller
{
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

    public function show
    (
        Information $information,
        InformationRepository $repository
    )
    {
        $hotInformation = $repository->hotInformation();
        return view('home.show',['information' =>$information,'hotInformation'=>$hotInformation]);
    }
}
