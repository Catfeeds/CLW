<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OfficeBuildingHouse extends Model
{
    protected $table = 'office_building_houses';

    protected $guarded = [];

    protected $connection = 'media';

    protected $cats =
        [
            'indoor_img' => 'array',
        ];
    protected $appends =
        [
            'indoor_img_cn',
            'price_arr_cn',
            'unit_price_cn'
        ];

    public function getIndoorImgCnAttribute()
    {
        return $this->indoor_img[0]?config('setting.qiniu_url').$this->indoor_img[0]:'';
    }

    public function BuildingBlock()
    {
        return $this->belongsTo('App\Models\BuildingBlock','building_block_id','id');
    }

    public function getPriceArrCnAttribute()
    {
        if($this->rent_price_unit == 2 && !empty($this->constru_acreage) && !empty($this->rent_price)){
            // 总价
            $this->priceArr = $this->rent_price*$this->constru_acreage.'元/月';
            // 单价
            $this->unitPrice =$this->rent_price.'元/㎡.月';
        } elseif ($this->rent_price_unit == 1 && !empty($this->constru_acreage) && !empty($this->rent_price)) {
            // 总价
            $this->priceArr = $this->rent_price.'元/月';
            // 单价
            $this->unitPrice = $this->constru_acreage/$this->priceArr.'元/㎡.月';
        } else {
            $this->priceArr = 0;
            $this->unitPrice = 0;
        }

        return $this->priceArr ;
        }

        public function getUnitPriceCnAttribute()
        {
            if($this->rent_price_unit == 2 && !empty($this->constru_acreage) && !empty($this->rent_price)){
                // 总价
                $this->priceArr = $this->rent_price*$this->constru_acreage.'元/月';
                // 单价
                $this->unitPrice =$this->rent_price.'元/㎡.月';
            } elseif ($this->rent_price_unit == 1 && !empty($this->constru_acreage) && !empty($this->rent_price)) {
                // 总价
                $this->priceArr = $this->rent_price.'元/月';
                // 单价
                $this->unitPrice = $this->constru_acreage/$this->priceArr.'元/㎡.月';
            } else {
                $this->priceArr = 0;
                $this->unitPrice = 0;
            }

            return $this->unitPrice ;
        }


}
