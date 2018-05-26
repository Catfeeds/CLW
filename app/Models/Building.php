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

    protected $appends = ['pic_url_cn',  'img_cn', 'type_label', 'pic_url', 'greening_rate_cn', 'acreage_cn', 'years_cn', 'building_block_num_cn',
        'parking_num_cn','parking_fee_cn'];

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

    //楼盘关联房源
    public function house()
    {
        return $this->hasManyThrough(OfficeBuildingHouse::class,BuildingBlock::class);
    }



    /**
     * 说明: 绿化绿加入单位
     *
     * @return string
     * @author 刘坤涛
     */
    public function getGreeningRateCnAttribute()
    {
        if ($this->greening_rate) return $this->greening_rate . '%';
    }

    /**
     * 说明: 总面积加入单位
     *
     * @return string
     * @author 刘坤涛
     */
    public function getAcreageCnAttribute()
    {
        if ($this->acreage) return (int)$this->acreage . '㎡';
    }

    /**
     * 说明: 年份加入单位
     *
     * @return string
     * @author 刘坤涛
     */
    public function getYearsCnAttribute()
    {
        if ($this->years) return $this->years . '年';
    }

    /**
     * 说明: 楼座数量加入单位
     *
     * @return string
     * @author 刘坤涛
     */
    public function getBuildingBlockNumCnAttribute()
    {
        if ($this->building_block_num) return $this->building_block_num . '座';
    }

    /**
     * 说明: 车位数量加入单位
     *
     * @return string
     * @author 刘坤涛
     */
    public function getParkingNumCnAttribute()
    {
        if ($this->parking_num) return $this->parking_num .'个';
    }


    public function getParkingFeeCnAttribute()
    {
        if ($this->parking_fee) return (int)$this->parking_fee . '元';
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

    /**
     * 说明: 获取楼盘轮播图
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function getPicUrlAttribute()
    {
        if (!empty($this->album)) {
            return collect($this->album)->map(function($img) {
                return [
                    'name' => $img,
                    'url' => config('setting.qiniu_url') . $img
                ];
            });
        } else {
            return collect([
                [
                    'name' => '',
                    'url' => config('setting.house_default_img')
                ]
            ]);
        }
    }

    /**
     * 说明：楼盘类型信息
     *
     * @return string
     * @author jacklin
     */
    public function getTypeLabelAttribute()
    {
        switch ($this->type) {
            case 1:
                return '住宅';
            case 2:
                return '写字楼';
            case 3:
                return '商铺';
        }
    }

//    public function getAddressCnAttribute()
//    {
//        return $this->area->name . '-' . $this->block->name;;
//    }

}
