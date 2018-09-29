<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildingLabel extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];

    public function oldBuilding()
    {
        return $this->belongsTo('App\Models\Building','building_id','id');
    }
}
