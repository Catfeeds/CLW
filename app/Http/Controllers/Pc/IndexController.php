<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Repositories\AreasRepository;
use App\Repositories\BuildingsRepository;
use App\Repositories\InformationRepository;

class IndexController extends Controller
{
    public function index
    (
        AreasRepository $areasRepository,
        InformationRepository $informationRepository,
        BuildingsRepository $buildingsRepository
    )
    {
        //全部区域
        $area = $areasRepository->areaList();
        //资讯中心
        $information = $informationRepository->informationList();
        //热点资讯
        $hotInformation = $informationRepository->hotInformation();
        //精品写字楼
        $eliteBuilding = $buildingsRepository->getEliteBuilding();
        //推荐服务

        return view('home.index');
    }
}
