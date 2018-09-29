<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    protected $guarded = [];

    protected $connection = 'buildings';

    // 如果使用的是非递增或者非数字的主键，则必须在模型上设置
    public $incrementing = false;

    // 主键
    protected $primaryKey = 'guid';

    // 主键类型
    protected $keyType = 'string';


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

    public function areaLocation()
    {
        return $this->belongsTo('App\Models\AreaLocation','guid', 'area_guid');
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
