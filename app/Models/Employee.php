<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';

    public function AcceptMessage()
    {
        return $this->hasMany('App\Models\AcceptMessage', 'employee_id','id');
    }
}
