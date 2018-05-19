<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    protected $guarded = [];

    protected $connection = 'media';

    // 城市
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    //楼盘
    public function building()
    {
        return $this->hasMany(Building::class);
    }

    public function block()
    {
        return $this->hasMany('App\Models\Block')->withCount('building');
    }

    /**
     * 说明: 街道下所属楼盘
     *
     * @return mixed
     * @author 罗振
     */
    public function getBuildingBlockAttribute()
    {
        return $this->building->map(function ($item) {
            return BuildingBlock::where('building_id', $item->id)->get();
        });
    }
}
