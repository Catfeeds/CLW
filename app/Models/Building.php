<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Building extends Model
{
    protected $casts = [
        'album' => 'array'
    ];


    protected $table = 'buildings';

    protected $guarded = [];

    protected $connection = 'media';

    public function buildingBlock()
    {
        return $this->hasMany('App\Models\BuildingBlock','building_id','id');
    }

}
