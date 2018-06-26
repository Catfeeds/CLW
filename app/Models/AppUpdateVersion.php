<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppUpdateVersion extends Model
{
    protected $guarded = [];

    protected $appends = [
        'type_cn'
    ];

    public function getTypeCnAttribute()
    {
        if ($this->type == 1) {
            return 'Ios';
        } elseif ($this->type == 2) {
            return 'Android';
        }
    }

}
