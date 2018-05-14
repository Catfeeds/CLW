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

    protected $appends = ['label_cn', 'feature_cn', 'address_cn',
        'pic_url_cn', 'house_number_cn', 'house_price_cn', 'address_type', 'img_cn'];

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
        return $this->features->pluck('name', 'id')->toArray();
    }

    /**
     * 说明: 获取该楼盘商圈名称
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function getAddressCnAttribute()
    {
        return $this->area->name.'-'.$this->block->name;
    }

    /**
     * 说明: 地址
     *
     * @return string
     * @use address_type
     * @author 罗振
     */
    public function getAddressTypeAttribute()
    {
        return $this->area->name.'/'.$this->block->name;
    }

    /**
     * 说明: 图片url
     *
     * @return static
     * @author 刘坤涛
     */
    public function getPicUrlCnAttribute()
    {
        return collect($this->album)->map(function($img) {
            return [
                'name' => $img,
                'url' => config('setting.qiniu_url') . $img
            ];
        });
    }

    /**
     * 说明: 楼盘默认图片
     *
     * @return string
     * @author 罗振
     */
    public function getImgCnAttribute()
    {
        if (empty($this->album)) {
            return config('setting.building_default_img');
        } else {
            return config('setting.qiniu_url').$this->album[0];
        }
    }


    //楼盘关联房源
    public function house()
    {
        return $this->hasManyThrough(OfficeBuildingHouse::class,BuildingBlock::class);
    }

    /**
     * 说明: 获取该楼盘下的房源数量
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function getHouseNumberCnAttribute()
    {

        return $this->house->count();
    }

    /**
     * 说明: 该楼盘下的房源单价
     *
     * @return float|int
     * @author 刘坤涛
     */
    public function getHousePriceCnAttribute()
    {
        if ($this->house && $this->house->sum('unit_price')) return $this->house->sum('unit_price') / $this->house_number_cn;
    }
    

}
