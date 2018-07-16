<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class OfficeBuildingHouse extends BaseModel
{
    use SoftDeletes;
    protected $table = 'office_building_houses';

    protected $guarded = [];

    protected $connection = 'media';

    protected $casts = [
        'indoor_img' => 'array',
        'constru_acreage' => 'integer',
        'min_acreage' => 'integer',
        'unit_price' => 'integer',
        'total_price' => 'integer',
    ];

    protected $appends = [
        'indoor_img_cn', 'unit_price_cn', 'constru_acreage_cn', 'total_price_cn', 'house_type', 'house_type_cn','payment_type_cn',
        'orientation_cn', 'renovation_cn', 'office_building_type_cn', 'check_in_time_cn', 'shortest_lease_cn',
        'split_cn', 'register_company_cn', 'open_bill_cn',  'house_feature', 'pic_url', 'floor_cn', 'show_cn',
        'station_number_cn'
    ];

    /**
     * 说明: 图片url
     *
     * @return \Illuminate\Config\Repository|mixed|string
     * @author 罗振
     */
    public function getIndoorImgCnAttribute()
    {
        if ($_SERVER["HTTP_HOST"] === config('hosts.home')) {
            return $this->indoor_img?config('setting.qiniu_url').$this->indoor_img[0]. config('setting.qiniu_suffix'):config('setting.pc_building_house_default_img');
        } else {
            return $this->indoor_img?config('setting.qiniu_url').$this->indoor_img[0]. config('setting.qiniu_suffix'):config('setting.house_default_img');
        }
    }

    /**
     * 说明: 获取房源轮播图
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function getPicUrlAttribute()
    {
        if (!empty($this->indoor_img)) {
            return collect($this->indoor_img)->map(function($img) {
                return [
                    'name' => $img,
                    'url' => config('setting.qiniu_url') . $img . config('setting.qiniu_suffix')
                ];
            });
        } else {
            if ($_SERVER["HTTP_HOST"] === config('hosts.home')) {
                return collect([
                    [
                        'name' => '',
                        'url' => config('setting.pc_building_house_default_img')
                    ]
                ]);
            } else {
                return collect([
                    [
                        'name' => '',
                        'url' => config('setting.house_default_img')
                    ]
                ]);
            }
        }
    }

    /**
     * 说明: 关联楼座
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author 罗振
     */
    public function buildingBlock()
    {
        return $this->belongsTo('App\Models\BuildingBlock','building_block_id','id');
    }

    /**
     * 说明: 关联房源标签表
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author 刘坤涛
     */
    public function houseLabel()
    {
        return $this->hasOne(HouseLabel::class, 'house_id', 'id');
    }

    public function getShowCnAttribute()
    {
        if ($this->shelf == 1) return '上架';
        return '下架';
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
            return '';
        } else {
            return (int)$this->unit_price.'元/㎡·月';
        }

    }
    
    //工位加入单位
    public function getStationNumberCnAttribute()
    {
        if (!$this->station_number) return '';
        return $this->station_number . '个';
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
     * @use total_price_cn
     * @author 罗振
     */
    public function getTotalPriceCnAttribute()
    {
        return empty($this->total_price)?'': (int)$this->total_price.'元/月';
    }

    /**
     * 说明: 所在楼层加入单位
     *
     * @return string
     * @author 刘坤涛
     */
    public function getFloorCnAttribute()
    {
        if($this->floor < 5) {
            return '低层';
        } elseif ($this->floor > 5 && $this->floor <= 10) {
            return '中层';
        } elseif ($this->floor > 10) {
            return '高层';
        }
    }


    /**
     * 说明: 户型拼接
     *
     * @return string
     * @use house_type
     * @author 罗振
     */
    public function getHouseTypeAttribute()
    {
        $houseType = '';
        if (!empty($this->room)) {
            $houseType = $this->room.'室';
        }
        if (!empty($this->hall)) {
            $houseType = $houseType.$this->hall.'厅';
        }

        return $houseType;
    }

    public function getHouseTypeCnAttribute()
    {
        $houseType = '';
        if (!empty($this->room)) {
            $houseType = $this->room.'室';
        }
        if (!empty($this->hall)) {
            $houseType = $houseType.$this->hall.'厅';
        }

        if ($this->split == 1) $houseType .= ',可定制';
        if ($this->split == 2) $houseType .= ',不可定制';
        return $houseType;
    }

    /**
     * 说明: 支付方式中文
     *
     * @return string
     * @use payment_type_cn
     * @author 罗振
     */
    public function getPaymentTypeCnAttribute()
    {
        if ($this->payment_type == 1) {
            return '押一付一';
        } elseif ($this->payment_type == 2) {
            return '押一付二';
        } elseif ($this->payment_type == 3) {
            return '押一付三';
        } elseif ($this->payment_type == 4) {
            return '押二付一';
        } elseif ($this->payment_type == 5) {
            return '押二付二';
        } elseif ($this->payment_type == 6) {
            return '押二付三';
        } elseif ($this->payment_type == 7) {
            return '押三付一';
        } elseif ($this->payment_type == 8) {
            return '押三付二';
        } elseif ($this->payment_type == 9) {
            return '押三付三';
        } elseif ($this->payment_type == 10) {
            return '半年付';
        } elseif ($this->payment_type == 11) {
            return '年付';
        } elseif ($this->payment_type == 12) {
            return '面谈';
        } else {
            return '';
        }
    }

    /**
     * 说明: 朝向中文
     *
     * @return string
     * @use orientation_cn
     * @author 罗振
     */
    public function getOrientationCnAttribute()
    {
        if ($this->orientation == 1) {
            return '东';
        } elseif ($this->orientation == 2) {
            return '南';
        } elseif ($this->orientation == 3) {
            return '西';
        } elseif ($this->orientation == 4) {
            return '北';
        } elseif ($this->orientation == 5) {
            return '东南';
        } elseif ($this->orientation == 6) {
            return '东北';
        } elseif ($this->orientation == 7) {
            return '西南';
        } elseif ($this->orientation == 8) {
            return '西北';
        }  elseif ($this->orientation == 9) {
            return '东西';
        } elseif ($this->orientation == 10) {
            return '南北';
        } else {
            return '';
        }
    }

    // 装修
    public function getRenovationCnAttribute()
    {
        if ($this->renovation == 1) {
            return '豪华装修';
        } elseif ($this->renovation == 2) {
            return '精装修';
        } elseif ($this->renovation == 3) {
            return '中装修';
        } elseif ($this->renovation == 4) {
            return '简装修';
        } elseif ($this->renovation == 5) {
            return '毛坯';
        } else {
            return '';
        }
    }


    /**
     * 说明: 写字楼类型中文
     *
     * @return string
     * @use office_building_type_cn
     * @author 罗振
     */
    public function getOfficeBuildingTypeCnAttribute()
    {
        if ($this->office_building_type == 1) {
            return '纯写字楼';
        } elseif ($this->office_building_type == 2) {
            return '商住楼';
        } elseif ($this->office_building_type == 3) {
            return '商业综合体楼';
        } elseif ($this->office_building_type == 4) {
            return '酒店写字楼';
        } elseif ($this->office_building_type == 5) {
            return '其他';
        } else {
            return '';
        }
    }

    /**
     * 说明: 入住时间中文
     *
     * @return string
     * @use check_in_time_cn
     * @author 罗振
     */
    public function getCheckInTimeCnAttribute()
    {
        if (empty($this->check_in_time)) {
            return '';
        } else {
            return $this->check_in_time;
        }
    }

    /**
     * 说明: 最短租期中文
     *
     * @return string
     * @use shortest_lease_cn
     * @author 罗振
     */
    public function getShortestLeaseCnAttribute()
    {
        if ($this->shortest_lease == 1) {
            return '1-2年';
        } elseif ($this->shortest_lease == 2) {
            return '2-3年';
        } elseif ($this->shortest_lease == 3) {
            return '3-4年';
        } elseif ($this->shortest_lease == 4) {
            return '5年以上';
        } else {
            return '';
        }
    }

    /**
     * 说明: 是否可拆分
     *
     * @return string
     * @use split_cn
     * @author 罗振
     */
    public function getSplitCnAttribute()
    {
        if ($this->split == 1) {
            return '可拆分';
        } elseif ($this->split == 2) {
            return '不可拆分';
        } else {
            return '';
        }
    }

    /**
     * 说明: 注册公司中文
     *
     * @return string
     * @use register_company_cn
     * @author 罗振
     */
    public function getRegisterCompanyCnAttribute()
    {
        if ($this->register_company == 1) {
            return '可注册';
        } elseif ($this->register_company == 2) {
            return '不可注册';
        } else {
            return '';
        }
    }

    /**
     * 说明: 可开发票中文
     *
     * @return string
     * @use open_bill_cn
     * @author 罗振
     */
    public function getOpenBillCnAttribute()
    {
        if ($this->open_bill == 1) {
            return '可开发票';
        } elseif ($this->open_bill == 2) {
            return '不可开发票';
        } else {
            return '';
        }
    }

    /**
     * 说明: 获取房源特色
     *
     * @return array
     * @author 刘坤涛
     */
    public function getHouseFeatureAttribute()
    {
        $data = [];
        if ($this->rent_free > 6 && $this->rent_free != 11) {
            $data[] = '免租期长';
        } else {
            $data[] = '';
        }
        //付款方式
        if ($this->payment_type == 1) {
            $data[] = '押一付一';
        } elseif ($this->payment_type == 2) {
            $data[] = '押一付二';
        } else {
            $data[] = '';
        }
        //装修
        if ($this->renovation == 1) {
            $data[] = '豪华装修';
        } else {
            $data[] = '';
        }
        return $data;
    }

    public static function miniHouseItems(self $house)
    {
        return [
            'guid' => $house->id,
            'id' => $house->id,
            'mini_label' => true,
            'title' => $house->title,
            'tel' => '123456',
            'building_name' => $house->buildingBlock->building->name,
            'total_acreage' => $house->constru_acreage,
            'unit_price' => $house->unit_price,
            'pay_type' => '押一付一',
            'address' => $house->buildingBlock->building->address,
            'img_url' => $house->pic_url,
            'degree' => 100,
            'house_type_hall' => true,
            'house_type_room' => true
        ];
    }
}
