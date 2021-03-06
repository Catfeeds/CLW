<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $casts = [
        'album' => 'array',
        'gps' => 'array',
        'big_album' => 'array'
    ];

    // 如果使用的是非递增或者非数字的主键，则必须在模型上设置
    public $incrementing = false;

    // 主键
    protected $primaryKey = 'guid';

    // 主键类型
    protected $keyType = 'string';

    protected $table = 'buildings';

    protected $guarded = [];

    protected $connection = 'buildings';

    protected $appends = [
        'pic_url_cn',
        'img_cn',
        'type_label',
        'pic_url',
        'greening_rate_cn',
        'acreage_cn',
        'years_cn',
        'building_block_num_cn',
        'parking_num_cn',
        'parking_fee_cn',
        'pc_pic_url',
        'pc_pic_cn',
        'company',
    ];

    public function getCompanyAttribute()
    {
        return null;
    }
    
    // 楼座
    public function buildingBlock()
    {
        return $this->hasMany('App\Models\BuildingBlock','building_guid','guid');
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

    // 楼盘关联房源
    public function house()
    {
        return $this->hasMany('App\Models\Houses','building_guid','guid')->where('shelf', 1)->where('house_busine_state', 1);
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

    // pc端图片url
    public function getPcPicUrlAttribute()
    {
        if (!empty($this->big_album)) {
            return collect($this->big_album)->map(function($img) {
                return [
                    'name' => $img,
                    'url' => config('setting.qiniu_url') . $img
                ];
            });
        } else {
            return collect([
                [
                    'name' => '',
                    'url' => config('setting.pc_building_default_big_img')
                ]
            ]);
        }
    }

    // pc端图片
    public function getPcPicCnAttribute()
    {
        if (empty($this->big_album)) {
            return config('setting.pc_building_default_big_img');
        } else {
            return config('setting.qiniu_url').$this->big_album[0];
        }
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
            if ($_SERVER["HTTP_HOST"] === config('hosts.home')) {
                return config('setting.pc_building_house_default_img');
            } else {
                return config('setting.building_default_img');
            }
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
}
