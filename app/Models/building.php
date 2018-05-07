<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Building extends Model
{
    protected $table = 'buildings';

    protected $guarded = [];

    protected $connection = 'media';

    protected $appends = ['count_cn'];

    // TODO
    public function getCountCnAttribute()
    {
        $buliding_block =  BuildingBlock::where('building_id', $this->id)->first();
        return  OfficeBuildingHouse::where('building_block_id', $buliding_block['id'])->count();
    }

}
