<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Repositories\AreasRepository;
use App\Repositories\BuildingsRepository;
use App\Repositories\HotBlocksRepository;
use App\Repositories\InformationRepository;
use App\Repositories\PcEnterpriseServicesRepository;
use App\Repositories\RecommendsRepository;

class IndexController extends Controller
{
    public function index
    (
        AreasRepository $areasRepository,
        InformationRepository $informationRepository,
        BuildingsRepository $buildingsRepository,
        RecommendsRepository $recommendsRepository,
        HotBlocksRepository $hotBlocksRepository,
        PcEnterpriseServicesRepository $pcEnterpriseServicesRepository
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
        //精选专题
        $recommends = $recommendsRepository->getList();
        //核心商圈
        $coreBlock = $hotBlocksRepository->getList();
        //推荐服务
        
        //企业服务
        $service = $pcEnterpriseServicesRepository->getList()->take(5);
        return view('home.index', [
            'area' => $area,
            'information' => $information,
            'hotInformation' => $hotInformation,
            'eliteBuilding' => $eliteBuilding,
            'recommends' => $recommends,
            'coreBlock' => $coreBlock,
            'service' => $service
        ]);
    }
}
