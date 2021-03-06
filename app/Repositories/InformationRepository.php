<?php

namespace App\Repositories;

use App\Models\Information;
use Illuminate\Database\Eloquent\Model;

class InformationRepository extends Model
{
    // 资讯列表
    public function informationList()
    {
        return Information::orderBy('created_at', 'desc')->paginate(10);
    }

    // 添加资讯
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

    // 修改资讯
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

    // 置顶
    public function setTop(
        $id
    )
    {
        return Information::where('id', $id)->update(['top' => 1]);
    }

    // 取消置顶
    public function delTop(
        $id
    )
    {
        return Information::where('id', $id)->update(['top' => 2]);
    }

    // 获取点击量最高的8条资讯
    public function hotInformation()
    {
        return Information::take(8)->orderBy('click_num','desc')->orderBy('created_at','desc')->get();
    }

    // 获取轮播资讯
    public function carousel()
    {
        return Information::take(3)->where('top',1)->latest()->get();
    }

    // 首页资讯
    public function getList()
    {
        $information = Information::where([])->orderBy('created_at','desc')->paginate(4);
        foreach ($information as $v) {
            $v->add_time = $v->created_at->format('Y-m-d');
        }
        return $information->setCollection(collect($information->items())->groupBy('add_time'));
    }

    // 上一条
    public function previous($id)
    {
        $previousId = Information::where('id', '<', $id)->max('id');
        if (empty($previousId)) return Information::first();
        return Information::where('id', $previousId)->first();
    }

    // 下一条
    public function next($id)
    {
        $nextId = Information::where('id', '>', $id)->min('id');
        if (empty($nextId)) return Information::all()->last();
        return Information::where('id', $nextId)->first();
    }
    
}