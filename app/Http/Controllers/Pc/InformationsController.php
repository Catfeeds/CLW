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
        $top = $repository->carousel();
        $hot = $repository->hotInformation();
        $list = $repository->getList();
        return '资讯页面';
    }

    public function show(Information $information)
    {
        return '资讯详情';
    }
}
