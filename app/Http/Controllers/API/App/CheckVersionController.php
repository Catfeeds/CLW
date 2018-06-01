<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\CheckVersionRequest;
use App\Models\AppUpdateVersion;

class CheckVersionController extends APIBaseController
{
    /**
     * 说明: 版本跟新检查
     *
     * @param CheckVersionRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        CheckVersionRequest $request
    )
    {
        if ($request->type == 'ios') {
            $type = config('setting.app_update_version_ios');
        } else {
            $type = config('setting.app_update_version_android');
        }

        $version = AppUpdateVersion::where([
            'status' => config('setting.app_update_version_able'),
            'type' => $type,
            'appId' => $request->appId,
            'version' => $request->version
        ])->first();
        if (empty($version)) return $this->sendResponse(['status' => false],'当前已是最新版本');

        // 获取当前app的最新版本号
        $newVersion = AppUpdateVersion::where([
            'status' => config('setting.app_update_version_able'),
            'type' => $type,
            'appId' => $request->appId
        ])->where('stage', '>', $version->stage)
            ->orderby('stage', 'desc')
            ->first();
        if (empty($newVersion)) return $this->sendResponse(['status' => false],'当前已是最新版本');
        $newVersion->status = true;
        return $this->sendResponse($newVersion, '新版本检查跟新成功');
    }

}
