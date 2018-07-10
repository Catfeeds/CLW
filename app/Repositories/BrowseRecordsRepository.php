<?php

namespace App\Repositories;

use App\Models\BrowseRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BrowseRecordsRepository extends Model
{
    /**
     * 说明: 浏览记录列表
     *
     * @param $request
     * @param $service
     * @param null $otherBrowseRecord
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @author 罗振
     */
    public function browseRecordList(
        $request,
        $service,
        $otherBrowseRecord = null
    )
    {
        if (empty($otherBrowseRecord)) {
            $user = Auth::guard('api')->user();
        } else {
            $user = Session::get('user');
        }
        $browseRecord =  BrowseRecord::with('officeBuildingHouse', 'officeBuildingHouse.houseLabel', 'officeBuildingHouse.buildingBlock.building')
            ->where('user_id', $user->id)->paginate($request->per_page??10);
        foreach($browseRecord as $v) {
            $service->houseInfo($v);
        }
        return $browseRecord;
    }
}