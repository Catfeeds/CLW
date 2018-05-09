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
}
