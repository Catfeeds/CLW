<?php

namespace App\Http\Controllers\API\App;

use App\Repositories\AreasRepository;
use App\Repositories\BannerRepository;
use App\Repositories\BuildingRecommendsRepository;
use App\Repositories\BuildingsRepository;
use App\Repositories\HotBlocksRepository;
use App\Repositories\RecommendsRepository;
use App\Repositories\ServiceRecommendsRepository;
use App\Repositories\SystemNoticesRepository;
use App\Services\BuildingsService;
use App\Services\ServicesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(
        BannerRepository $bannerRepository,
        ServicesService $servicesService,
        SystemNoticesRepository $systemNoticesRepository,
        RecommendsRepository $recommendsRepository,
        ServiceRecommendsRepository $serviceRecommendsRepository,
        HotBlocksRepository $hotBlocksRepository,
        BuildingRecommendsRepository $buildingRecommendsRepository,
        BuildingsService $service,
        Request $request,
        BuildingsRepository $buildingsRepository,
        AreasRepository $areasRepository
    )
    {
        // banner
        $banners = $bannerRepository->bannerList();

        // 企业服务
        $services = $servicesService->getServices();

        // 系统公告
        $systemNotices = $systemNoticesRepository->SystemNoticesList();

        // 精品推荐
        $recommends = $recommendsRepository->recommendsList();

        // 推荐服务
        $serviceRecommends = $serviceRecommendsRepository->getList();

        // 热门商圈
        $hotBlocks = $hotBlocksRepository->hotBlocksList();

        // 写字楼推荐
        $buildingRecommends = $buildingRecommendsRepository->recommendList($service);

        // 区域
        $areas = $areasRepository->areaList();

        return $this->sendResponse([
            'banners' => $banners,
            'services' => $services,
            'systemNotices' => $systemNotices,
            'recommends' => $recommends,
            'serviceRecommends' => $serviceRecommends,
            'hotBlocks' => $hotBlocks,
            'buildingRecommends' => $buildingRecommends,
            'areas' => $areas
        ], '首页列表成功');
    }
}
