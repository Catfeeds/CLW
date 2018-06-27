<?php

namespace App\Http\Controllers\PC;

use App\Http\Controllers\Controller;
use App\Repositories\InformationRepository;

class InformationController extends Controller
{
    public function index
    (
        InformationRepository $repository
    )
    {
        $top = $repository->carousel();
        $hot = $repository->hotInformation();
        $content = $repository->getList();
        dd($content);
        return '资讯页面';
    }

    public function show()
    {
        return '资讯详情';
    }
}
