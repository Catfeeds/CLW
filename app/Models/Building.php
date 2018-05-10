<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $casts = [
        'album' => 'array',
        'gps' => 'array',
        'company' => 'array'
    ];

    protected $table = 'buildings';

    protected $guarded = [];

    protected $connection = 'media';

    protected $appends = ['label_cn', 'feature_cn', 'block_name', 'area_name', 'pic_url'];

    // 楼座
    public function buildingBlock()
    {
        return $this->hasMany('App\Models\BuildingBlock','building_id','id');
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

    // 标签
    public function label()
    {
        return $this->hasOne(BuildingLabel::class);
    }

    //区域
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * 说明: 楼盘列表是否有标签
     *
     * @return bool
     * @author 刘坤涛
     */
    public function getLabelCnAttribute()
    {
        return !empty($this->label);
    }

    /**
     * 说明: 楼盘特色
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function getFeatureCnAttribute()
    {
        return $this->features;
    }

    /**
     * 说明: 获取该楼盘商圈名称
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function getBlockNameAttribute()
    {
        return $this->block->name;
    }

    /**
     * 说明: 获取该楼盘区域名称
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function getAreaNameAttribute()
    {
        return $this->area->name;
    }

    /**
     * 说明: 图片url
     *
     * @return static
     * @author 刘坤涛
     */
    public function getPicUrlAttribute()
    {
        return collect($this->album)->map(function($img) {
            return [
                'name' => $img,
                'url' => config('setting.qiniu_url') . $img
            ];
        });
    }




}
