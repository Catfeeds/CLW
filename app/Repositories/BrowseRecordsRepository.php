<?php

namespace App\Repositories;

use App\Models\BrowseRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BrowseRecordsRepository extends Model
{
    /**
     * 说明: 获取该用户的浏览记录
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function browseRecordList($request)
    {
        $user = Auth::guard('api')->user();
        return BrowseRecord::where('user_id', $user->id)->paginate($request->per_page??10);
    }
}