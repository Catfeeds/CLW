<?php

namespace App\Repositories;

use App\Models\PcServiceRecommend;

use Illuminate\Database\Eloquent\Model;

class PcServiceRecommendsRepository extends Model
{
    // pc端推荐服务管理列表
    public function PcServiceRecommendList()
    {
        return PcServiceRecommend::paginate(10);
    }

    // 添加pc端推荐服务
    public function addPcServiceRecommend($request)
    {
        return PcServiceRecommend::create([
            'pic' => $request->pic,
            'url' => $request->url
        ]);
    }

    // 修改pc端推荐服务
    public function updatePcServiceRecommend($request,$PcServiceRecommend)
    {
         $PcServiceRecommend->pic = $request->pic;
         $PcServiceRecommend->url = $request->url;
         if(!$PcServiceRecommend->save()) return false;
         return true;
    }
}