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

    protected $appends = ['label_cn'];

    public function buildingBlock()
    {
        return $this->hasMany('App\Models\BuildingBlock','building_id','id');
    }

    /**
     * 说明: 楼盘列表是否有标签
     *
     * @return bool
     * @author 刘坤涛
     */
    public function getLabelCnAttribute()
    {
        $res = BuildingLabel::find($this->id);
        if ($res) return true;
        return false;
    }

    // 所属商圈
    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    // 特色
    public function features()
    {
        return $this->belongsToMany(BuildingFeature::class, 'CLW.building_has_features');
    }

}
