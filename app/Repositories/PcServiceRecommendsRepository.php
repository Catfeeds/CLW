<?php

namespace App\Repositories;

use App\Models\PcServiceRecommend;

use Illuminate\Database\Eloquent\Model;

class PcServiceRecommendsRepository extends Model
{
    /**
     * 说明: pc端推荐服务商铺管理列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 郑宇
     */
    public function PcServiceRecommendList()
    {
        return PcServiceRecommend::all();
    }

    /**
     * 说明: 添加PcServiceRecommend的操作
     *
     * @param $request
     * @return mixed
     * @author 郑宇
     */
    public function addPcServiceRecommend($request)
    {
        return PcServiceRecommend::created([
            'pic' = $request->pic,
            'url' = $request->url
        ]);
    }

    /**
     * 说明: 修改PcServiceRecommend的操作
     *
     * @param $request
     * @param $addPcServiceRecommend
     * @return bool
     * @author 郑宇
     */
    public function updatePcServiceRecommend($request,$PcServiceRecommend)
    {
         $PcServiceRecommend->pic = $request->pic;
         $PcServiceRecommend->url = $request->url
         if(!$PcServiceRecommend->save()) return false;
         return true;
    }
}