<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BuildingBlock extends Model
{
    protected $table = 'building_blocks';

    protected $guarded = [];

    protected $connection = 'media';

    public function OfficeBuildingHouse()
    {
        return $this->hasMany('App\Models\OfficeBuildingHouse', 'building_block_id', 'id');
    }
}