<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawCustom extends Model
{
    protected $guarded = [];
    protected $connection = 'media';

    // 关联管理层
    public function manage()
    {
        return $this->belongsTo(User::class, 'shopkeeper_id', 'id');
    }
    
    // 关联经纪人
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id', 'id');
    }

    // 关联房子
    public function house()
    {
        return $this->hasOne(OfficeBuildingHouse::class, 'gd_identifier', 'identifier');
    }


    // 关联客户
    public function customer()
    {
        return $this->hasOne(Custom::class, 'identifier', 'identifier');
    }
}
