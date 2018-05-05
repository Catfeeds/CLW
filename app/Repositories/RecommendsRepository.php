<?php

namespace App\Repositories;

use App\Models\Recommend;
use Illuminate\Database\Eloquent\Model;

class RecommendsRepository extends Model
{
    public function recommendsList()
    {
        return Recommend::all();
    }

    public function addRecommends($request)
    {
        return Recommend::create([
            'title' => $request->title,
            'introduce' => $request->introduce,
            'pic' => $request->pic,
            'building_id' => $request->building_id
        ]);
    }

    public function updateRecommend($recommend, $request)
    {
        $recommend->title = $request->title;
        $recommend->introduce = $request->introduce;
        $recommend->pic = $request->pic;
        $recommend->building_id = $request->building_id;

        if (!$recommend->save()) return false;
        return true;
    }
}