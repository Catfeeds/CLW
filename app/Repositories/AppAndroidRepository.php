<?php

namespace App\Repositories;

use App\Models\AppUpdateVersion;
use Illuminate\Database\Eloquent\Model;

class AppAndroidRepository extends Model
{
    // app,android版本列表
    public function appAndroidList()
    {
        return AppUpdateVersion::where(['status' => 1])->orderby('id', 'desc')->paginate(10);
    }

    // app,android版本添加
    public function addAppAndroid(
        $request
    )
    {
        // 验证级别是不是最高
        $maxStage = AppUpdateVersion::where([
            'appId' => $request->appId,
            'type' => $request->type
        ])->get()->max('stage');
        if ($request->stage < $maxStage) return ['status' => false, 'message' => '版本级别必须大于目前最大级别'];

        $addRes = AppUpdateVersion::create([
            'appId' => $request->appId,
            'version' => $request->version,
            'note' => $request->note,
            'url' => $request->url,
            'type' => $request->type,
            'stage' => $request->stage,
            'status' => 1
        ]);
        if (empty($addRes)) return ['status' => false, 'message' => '添加失败'];
        return ['status' => true, 'message' => '添加成功'];
    }

    // 获取最新下载地址
    public function getNewVersion()
    {
        return AppUpdateVersion::where(['status' => 1])->whereIn('type', [1,2])->orderBy('stage')->pluck('url','type');
    }

}