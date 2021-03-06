<?php

namespace App\Http\Controllers\We;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\AppAndroidRepository;

class AppAndroidController extends APIBaseController
{
    // 获取最新下载地址
    public function index(
        AppAndroidRepository $repository
    )
    {
        $res = $repository->getNewVersion();
        return view('we.appDownload', ['res' => $res]);
    }
}
