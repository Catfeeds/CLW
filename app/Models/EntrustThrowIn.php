<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntrustThrowIn extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';
    use SoftDeletes;

    protected $appends = ['type_cn'];

    //需求类型
    public function getTypeCnAttribute()
    {
        if ($this->type == 1) {
            return '委托找房';
        }

        if ($this->type == 2) {
            return '投放房源';
        }
    }
}
