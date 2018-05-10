<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BuildingBlock extends Model
{
    protected $table = 'building_blocks';

    protected $guarded = [];

    protected $connection = 'media';

    protected $appends = [
        'class_cn', 'structure_cn', 'property_fee_cn', 'heating_cn', 'air_conditioner_cn'
    ];

    public function OfficeBuildingHouse()
    {
        return $this->hasMany('App\Models\OfficeBuildingHouse', 'building_block_id', 'id');
    }

    public function Building()
    {
        return $this->belongsTo('App\Models\Building','building_id','id');
    }

    /**
     * 说明: 等级中文
     *
     * @return string
     * @use buildng_block_class
     * @author 罗振
     */
    public function getClassCnAttribute()
    {
        if ($this->class == 1) {
            return '甲';
        } elseif ($this->class == 1) {
            return '乙';
        } elseif ($this->class == 3) {
            return '丙';
        }
    }

    /**
     * 说明: 房屋结构中文
     *
     * @return string
     * @use structure_cn
     * @author 罗振
     */
    public function getStructureCnAttribute()
    {
        if ($this->structure == 1) {
            return '钢筋混凝土结构';
        } elseif ($this->structure == 1) {
            return '钢结构';
        } elseif ($this->structure == 3) {
            return '砖混结构';
        } elseif ($this->structure == 4) {
            return '砖木结构';
        }
    }

    /**
     * 说明: 物业费
     *
     * @return string
     * @use property_fee_cn
     * @author 罗振
     */
    public function getPropertyFeeCnAttribute()
    {
        if (empty($this->property_fee)) {
            return '';
        } else {
            return $this->property_fee.'元/㎡.月';
        }
    }

    /**
     * 说明: 采暖方式中文
     *
     * @return string
     * @use heating_cn
     * @author 罗振
     */
    public function getHeatingCnAttribute()
    {
        if ($this->heating == 1) {
            return '空调';
        } elseif ($this->heating == 2) {
            return '太阳能';
        }
    }

    /**
     * 说明: 空调类型中文
     *
     * @return string
     * @use air_conditioner_cn
     * @author 罗振
     */
    public function getAirConditionerCnAttribute()
    {
        if ($this->air_conditioner == 1) {
            return '中央空调';
        } elseif ($this->air_conditioner == 2) {
            return '非中央空调';
        }
    }
}
