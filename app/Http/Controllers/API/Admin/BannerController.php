<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Controllers\Traits\QiNiu;
use App\Http\Controllers\Traits\SafeString;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use App\Handler\Common;

class BannerController extends APIBaseController
{
    use QiNiu;
    use SafeString;

    /**
     * 说明: 获取列表
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
        if (empty(Common::user()->can('banner_list'))) {
            return $this->sendError('无banner列表权限','403');
        }

        $res = $bannerRepository->bannerList();
        return $this->sendResponse($res,'banner列表获取成功');
    }

    /**
     * 说明: 添加
     *
     * @param BannerRepository $bannerRepository
     * @param BannerRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function store
    (
        BannerRepository $bannerRepository,
        BannerRequest $request
    )
    {
        if (empty(Common::user()->can('add_banner'))) {
            return $this->sendError('无banner添加权限','403');
        }
        $res = Banner::all()->toArray();
        if (!empty($res)) {
            return $this->sendError('banner无法重复添加','405');
        } else {
            $result = $bannerRepository->addBanner($request);
            return $this->sendResponse($result, '添加banner成功');
        }
    }

    /**
     * 说明: 修改之前原始数据
     *
     * @param Banner $banner
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function edit(Banner $banner)
    {
        return $this->sendResponse($banner,'修改之前原始数据获取成功');
    }

    /**
     * 说明: 修改
     *
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
        if (empty(Common::user()->can('update_banner'))) {
            return $this->sendError('无banner修改权限','403');
        }
        $res = $bannerRepository->updateBanner($request, $banner);
        return $this->sendResponse($res,'banner修改成功');
    }

    /**
     * 说明: 删除
     *
     * @param Banner $banner
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 王成
     */
    public function destroy(Banner $banner)
    {
        if (empty(Common::user()->can('del_banner'))) {
            return $this->sendError('无banner删除权限','403');
        }
        $res = $banner->delete();
        return $this->sendResponse($res,'图片删除成功');
    }
}
