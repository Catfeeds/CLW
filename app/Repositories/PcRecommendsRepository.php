<?php

namespace App\Repositories;

use App\Models\PcRecommend;
use Illuminate\Database\Eloquent\Model;

class PcRecommendsRepository extends Model
{
    // pc端精品推荐列表
    public function pcRecommendsList()
    {
        return PcRecommend::paginate(10);
    }
    
    // 添加pc端精品推荐
    public function addPcRecommends(
        $request
    )
    {
        return PcRecommend::create([
            'title' => $request->title,
            'introduce' => $request->introduce,
            'pic' => $request->pic,
            'big_details_pic' => $request->big_details_pic,
            'small_details_pic' => $request->small_details_pic,
            'building_id' => $request->building_id,
            'building_guid' => $request->building_guid,
            'building_info' => $request->building_info
        ]);
    }

    // 修改pc端精品推荐
    public function updatePcRecommends(
        $request,
        $pcRecommend
    )
    {
        $pcRecommend->title = $request->title;
        $pcRecommend->introduce = $request->introduce;
        $pcRecommend->pic = $request->pic;
        $pcRecommend->big_details_pic = $request->big_details_pic;
        $pcRecommend->small_details_pic = $request->small_details_pic;
        $pcRecommend->building_id = $request->building_id;
        $pcRecommend->building_guid = $request->building_guid;
        $pcRecommend->building_info = $request->building_info;
        if (!$pcRecommend->save()) return false;
        return true;
    }

    // pc端精选专题
    public function getList()
    {
        return PcRecommend::where('pic','!=',null)->get()->take(5);
    }
}