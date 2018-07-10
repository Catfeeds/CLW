<?php

namespace App\Http\Controllers\PC;

use App\Models\BrowseRecord;
use App\Repositories\BrowseRecordsRepository;
use App\Services\OfficeBuildingHousesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrowseRecordsController extends Controller
{
    //获取浏览记录列表
    public function index
    (
        Request $request,
        OfficeBuildingHousesService $service,
        BrowseRecordsRepository $repository
    )
    {
        $res = $repository->browseRecordList($request,$service,true);
        return $this->sendResponse($res,'获取浏览记录列表');
    }

    //删除浏览记录
    public function destroy(
        BrowseRecord $browseRecord
    )
    {
         $res = $browseRecord->delete();
         return $this->sendResponse($res,'删除浏览记录成功');
    }
}
