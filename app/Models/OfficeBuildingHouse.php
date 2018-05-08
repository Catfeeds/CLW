<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OfficeBuildingHouse extends Model
{
    protected $table = 'office_building_houses';

    protected $guarded = [];

    protected $connection = 'media';

    protected $cats =
        [
            'indoor_img' => 'array',
        ];

    public function BuildingBlock()
    {
        return $this->belongsTo('App\Models\BuildingBlock','building_block_id','id');
    }
}
