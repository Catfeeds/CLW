<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $guarded = [];
    
    protected $appends = ['acreage', 'title', 'unit_price', 'total_price', 'feature'];

    public function officeBuildingHouse()
    {
        return $this->belongsTo(OfficeBuildingHouse::class, 'house_id', 'id');
    }

    //面积
    public function getAcreageAttribute()
    {
        return $this->officeBuildingHouse->constru_acreage;
    }

    //标题
    public function getTitleAttribute()
    {
        return $this->officeBuildingHouse->getHouseTitleAttribute();
    }

    //单价
    public function getUnitPriceAttribute()
    {
        return  $this->officeBuildingHouse->unit_price.'/㎡·月';
    }

    //总价
    public function getTotalPriceAttribute()
    {
        return  $this->officeBuildingHouse->getTotalPriceCnAttribute();
    }

    //特色
    public function getFeatureAttribute()
    {
        return $this->officeBuildingHouse->getHouseFeatureAttribute();
    }
}
