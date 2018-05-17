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
     * @return mixed
     * @author 刘坤涛
     */
    public function browseRecordList()
    {
        $user = Auth::guard('api')->user();
        return BrowseRecord::where('user_id', $user->id)->get();
    }
}