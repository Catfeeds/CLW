<?php

namespace App\Repositories;

use App\Models\Information;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InformationRepository extends Model
{
    public function informationList()
    {
        return Information::where([])->paginate(10);
    }
    
    public function addInformation(
        $request
    )
    {
        return Information::create([
            'banner' => $request->banner,
            'source' => $request->source,
            'title' => $request->title,
            'brief' => $request->brief,
            'content' => $request->content,
        ]);
    }

    public function updateInformation(
        $request,
        Information $information
    )
    {
        $information->banner = $request->banner;
        $information->source = $request->source;
        $information->title = $request->title;
        $information->brief = $request->brief;
        $information->content = $request->content;

        if (!$information->save()) return false;
        return true;
    }

    public function setTop(
        $id
    )
    {
        return Information::where('id', $id)->update(['top' => 1]);
    }

    public function delTop(
        $id
    )
    {
        return Information::where('id', $id)->update(['top' => 2]);
    }

    //获取点击量最高的8条资讯
    public function hotInformation()
    {
        $res = Information::take(8)->orderBy('click_num','desc')->orderBy('created_at','desc')->get();
        return $res;
    }

    //获取轮播资讯
    public function carousel()
    {
        $res = Information::take(3)->where('top',1)->latest()->get();
        return $res;
    }

    //首页资讯
    public function getList()
    {

    }
}