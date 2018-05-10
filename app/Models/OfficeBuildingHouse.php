<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OfficeBuildingHouse extends Model
{
    protected $table = 'office_building_houses';

    protected $guarded = [];

    protected $connection = 'media';

    protected $cats = [
        'indoor_img' => 'array',
    ];

    protected $appends = [
        'indoor_img_cn', 'unit_price_cn', 'constru_acreage_cn', 'total_acreage_cn'
    ];

    public function getIndoorImgCnAttribute()
    {
        return $this->indoor_img[0]?config('setting.qiniu_url').$this->indoor_img[0]:'';
    }

    public function BuildingBlock()
    {
        return $this->belongsTo('App\Models\BuildingBlock','building_block_id','id');
    }

    /**
     * 说明: 单价加入单位
     *
     * @return string
     * @use unit_price_cn
     * @author 罗振
     */
    public function getUnitPriceCnAttribute()
    {
        if (empty($this->unit_price)) {
            return '0';
        } else {
            return $this->unit_price.'元/㎡.月';
        }
    }

    /**
     * 说明: 面积加入单位
     *
     * @return string
     * @use constru_acreage_cn
     * @author 罗振
     */
    public function getConstruAcreageCnAttribute()
    {
        return $this->constru_acreage.'㎡';
    }

    /**
     * 说明: 总价加入单位
     *
     * @return string
     * @use total_acreage_cn
     * @author 罗振
     */
    public function getTotalAcreageCnAttribute()
    {
        if (empty($this->unit_price)) {
            return '0';
        } else {
            return $this->unit_price * $this->constru_acreage.'元/月';
        }
    }

    
}
