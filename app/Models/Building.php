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

    protected $appends = ['label_cn', 'feature_cn'];

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
        $res = BuildingLabel::where('building_id', $this->id)->first();
        if ($res) return true;
        return false;
    }

    /**
     * 说明: 获取该楼盘下的特色
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function getFeatureCnAttribute()
    {
        $building_feature_id = BuildingHasFeature::where('building_id', $this->id)->pluck('building_feature_id')->toArray();
        $res = BuildingFeature::whereIn('id', $building_feature_id)->get();
        return $res->map(function($v) {
            return [
                'label' => $v->name,
                'value' => $v->id
            ];
        });
    }

}
