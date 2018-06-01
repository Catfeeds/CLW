<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcceptMessage extends Model
{
    protected $guarded = [];

    protected $appends = ['type_name_cn'];

    public function getTypeNameCnAttribute()
    {
        switch ($this->type) {
            case 1:
                return '预约看房';
                break;
            case 2 :
                return '房源投放';
                break;
            default;
                break;
        }
    }
}
