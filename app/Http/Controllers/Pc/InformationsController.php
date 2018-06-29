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
        return view('home.information', ['content' => $content, 'tops' => $top, 'hots' => $hot]);
    }

    public function show(Information $information)
    {
        return '资讯详情';
    }
}
