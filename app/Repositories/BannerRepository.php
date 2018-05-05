<?php

namespace App\Repositories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Model;

class BannerRepository extends Model
{
    /**
     * 说明: banner列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 王成
     */
    public function bannerList()
    {
        return Banner::all();
    }

    /**
     * 说明: 更新banner的操作
     *
     * @param $request
     * @return mixed
     * @author 王成
     */
    public function addBanner($request)
    {
        return Banner::create([
            'banner' => $request->banner
        ]);
    }

    /**
     * 说明: 修改banner的操作
     *
     * @param $request
     * @param $banner
     * @return bool
     * @author 王成
     */
    public function updateBanner($request, $banner)
    {
        $banner->banner = $request->banner;
        if(!$banner->save()) return false;
        return true;
    }
}