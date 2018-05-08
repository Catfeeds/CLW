<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\BannerRepository;

class BannerController extends APIBaseController
{
    /**
     * 说明: banner列表
     *
     * @param BannerRepository $bannerRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function index
    (
        BannerRepository $bannerRepository
    )
    {
        $res = $bannerRepository->bannerList();
        return $this->sendResponse($res,'banner列表获取成功');
    }
}
