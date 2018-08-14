<?php

namespace App\Http\Controllers\Pc;

use App\Handler\Common;
use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Repositories\AreasRepository;
use App\Repositories\BuildingsRepository;
use App\Repositories\HotBlocksRepository;
use App\Repositories\InformationRepository;
use App\Repositories\PcEnterpriseServicesRepository;
use App\Repositories\PcRecommendsRepository;
use App\Repositories\PcServiceRecommendsRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{   
    // 前端首页
    public function index
    (
        AreasRepository $areasRepository,
        InformationRepository $informationRepository,
        BuildingsRepository $buildingsRepository,
        PcRecommendsRepository $pcRecommendsRepository,
        HotBlocksRepository $hotBlocksRepository,
        PcEnterpriseServicesRepository $pcEnterpriseServicesRepository,
        PcServiceRecommendsRepository $pcServiceRecommendsRepository
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
        $pcRecommends = $pcRecommendsRepository->getList();
        //核心商圈
        $coreBlock = $hotBlocksRepository->getList();
        //推荐服务
        $recommendService = $pcServiceRecommendsRepository->PcServiceRecommendList()->take(4);
        //企业服务
        $service = $pcEnterpriseServicesRepository->getList()->take(5);

        return view('home.index', [
            'area' => $area,
            'information' => $information,
            'hotInformation' => $hotInformation,
            'eliteBuilding' => $eliteBuilding,
            'pcRecommends' => $pcRecommends,
            'coreBlock' => $coreBlock,
            'service' => $service,
            'recommendService' => $recommendService
        ]);
    }

    // 通过关键字获取楼盘名
    public function getSelectInfo(
        Request $request
    )
    {
        $string = "'". $request['selectInfo'] . "'";
        $res = \DB::select("select building_id from media.building_keywords where MATCH(keywords) AGAINST($string IN BOOLEAN MODE)");
        // 获取所有楼盘id
        $buildingIds = array_column(Common::objectToArray($res), 'building_id');

        $res = Building::whereIn('id', $buildingIds)->pluck('name')->toArray();

        return $this->sendResponse(collect($res)->map(function ($v) {
            return [
                'value' => $v
            ];
        }),'通过关键字获取楼盘名成功');
    }
}
