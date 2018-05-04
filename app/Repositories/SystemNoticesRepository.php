<?php

namespace App\Repositories;

use App\Models\SystemNotice;
use Illuminate\Database\Eloquent\Model;

class SystemNoticesRepository extends Model
{
    /**
     * 说明: 获取系统公告列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 罗振
     */
    public function SystemNoticesList()
    {
        return SystemNotice::all();
    }

    /**
     * 说明: 添加系统公告操作
     *
     * @param $request
     * @return mixed
     * @author 罗振
     */
    public function addSystemNotices($request)
    {
        return SystemNotice::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
    }

    /**
     * 说明: 修改系统公告操作
     *
     * @param $request
     * @param SystemNotice $systemNotice
     * @return bool
     * @author 罗振
     */
    public function updateSystemNotices(
        $request,
        SystemNotice $systemNotice
    )
    {
        $systemNotice->title = $request->title;
        $systemNotice->content = $request->content;
        if (!$systemNotice->save()) {
            return false;
        }
        return true;
    }
}