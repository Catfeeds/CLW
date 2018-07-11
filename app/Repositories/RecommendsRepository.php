<?php

namespace App\Repositories;

use App\Models\Recommend;
use Illuminate\Database\Eloquent\Model;

class RecommendsRepository extends Model
{
    /**
     * 说明: 楼盘精品推荐列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 刘坤涛
     */
    public function recommendsList()
    {
        $recommends = Recommend::all();
        foreach ($recommends as $recommend) {
            $recommend->name = $recommend->building->name;
        }
        return $recommends;
    }

    //pc端精选专题
    public function getList()
    {
        return Recommend::take(5)->where('pc_pic','!=',null)->get();
    }

    /**
     * 说明: 楼盘精品推荐添加操作
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function addRecommends($request)
    {
        return Recommend::create([
            'title' => $request->title,
            'introduce' => $request->introduce,
            'pic' => $request->pic,
            'building_id' => $request->building_id,
            'building_info' => $request->building_info,
            'pc_pic' => $request->pc_pic,
            'pc_big_details_pic' => $request->pc_big_details_pic,
            'pc_small_details_pic' => $request->pc_small_details_pic,
            'details_introduce' => $request->details_introduce
        ]);
    }

    /**
     * 说明: 楼盘精品推荐修改操作
     *
     * @param $recommend
     * @param $request
     * @return bool
     * @author 刘坤涛
     */
    public function updateRecommend($recommend, $request)
    {
        $recommend->title = $request->title;
        $recommend->introduce = $request->introduce;
        $recommend->pic = $request->pic;
        $recommend->building_id = $request->building_id;
        $recommend->building_info = $request->building_info;
        $recommend->pc_pic = $request->pc_pic;
        $recommend->pc_big_details_pic = $request->pc_big_details_pic;
        $recommend->pc_small_details_pic = $request->pc_small_details_pic;
        $recommend->details_introduce = $request->details_introduce;
        if (!$recommend->save()) return false;
        return true;
    }

//    /**
//     * 说明：首页点击精品推荐跳转到楼盘列表
//     *
//     * @param $building_id
//     * @return mixed
//     * @author jacklin
//     */
//    public function getBuildingList($building_id, $service)
//    {
//        $buildings = Building::with(['buildingBlock', 'area', 'block', 'label', 'features', 'house'])->whereIn('id', $building_id)->get();
//
//        foreach ($buildings as $v) {
//            $count = $v->house->count();
//            $price = $v->house->pluck('unit_price')->avg();
//            $service->features($v);
//            $service->label($v);
//            $service->getAddress($v);
//
//            // 单价
//            if (empty($price)) {
//                $v->price = '';
//            } else {
//                $v->price = round($price,2).'元/㎡.月';
//            }
//
//            // 数量
//            if (empty($count)) {
//                $v->count = '';
//            } else {
//                $v->count = $count.'套';
//            }
//        }
//        return $buildings;
//    }
}