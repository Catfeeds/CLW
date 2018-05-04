<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\API\BannerRequest;
use App\Models\Banner;
use App\Repositories\BannerRepository;



class BannerController extends APIBaseController
{
    /**
     *说明 更新banner
     * @param BannerRepository $bannerRepository
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function store
    (
        BannerRepository $bannerRepository,
        BannerRequest $request
    )
    {

        $res = $bannerRepository->addBanner($request);

            return $this->sendResponse($res, '图片新增成功');

    }

    /**
     *说明 软删除banner
     * @param Banner $banner
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 王成
     */
    public function destroy(Banner $banner)
    {
        $res = $banner->delete();
        return $this->sendResponse($res,'图片删除成功');
    }

    /**
     *说明 修改banner
     * @param BannerRepository $bannerRepository
     * @param BannerRequest $request
     * @param Banner $banner
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function update
    (
        BannerRepository $bannerRepository,
        BannerRequest $request,
        Banner $banner
    )
    {
        $res = $bannerRepository->updateBanner($request,$banner);
        return $this->sendResponse($res,'图片修改成功');
    }

    /**
     *说明 修改之前原始banner
     * @param Banner $banner
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function edit(Banner $banner)
    {
        return $this->sendResponse($banner,'修改之前原始数据');
    }

    /**
     *说明 查询所有banner
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
        return $this->sendResponse($res,'获取图片');
    }
}
