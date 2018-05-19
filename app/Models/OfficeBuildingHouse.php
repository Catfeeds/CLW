<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OfficeBuildingHouse extends Model
{
    protected $table = 'office_building_houses';

    protected $guarded = [];

    protected $connection = 'media';

    protected $casts = [
        'indoor_img' => 'array',
    ];

    protected $appends = [
        'indoor_img_cn', 'unit_price_cn', 'constru_acreage_cn', 'total_price_cn', 'house_type', 'payment_type_cn',
        'orientation_cn', 'renovation_cn', 'office_building_type_cn', 'check_in_time_cn', 'shortest_lease_cn',
        'split_cn', 'register_company_cn', 'open_bill_cn',  'house_feature', 'pic_url'
    ];

    /**
     * 说明: 图片url
     *
     * @return \Illuminate\Config\Repository|mixed|string
     * @author 罗振
     */
    public function getIndoorImgCnAttribute()
    {
        return $this->indoor_img?config('setting.qiniu_url').$this->indoor_img[0]:config('setting.house_default_img');
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
                    'url' => config('setting.qiniu_url') . $img
                ];
            });
        } else {
            return [
                [
                    'name' => '',
                    'url' => config('setting.house_default_img')
                ]
            ];
        }
    }

    /**
     * 说明: 关联楼座
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author 罗振
     */
    public function BuildingBlock()
    {
        return $this->belongsTo('App\Models\BuildingBlock','building_block_id','id');
    }

    /**
     * 说明: 关联房源标签表
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author 刘坤涛
     */
    public function HouseLabel()
    {
        return $this->hasOne(HouseLabel::class, 'house_id', 'id');
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
            return $this->unit_price.'元/㎡·月';
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
     * @use total_price_cn
     * @author 罗振
     */
    public function getTotalPriceCnAttribute()
    {
        return empty($this->total_price)?'':round($this->total_price, 1).'元/月';
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

    /**
     * 说明: 装修中文
     *
     * @return string
     * @use renovation_cn
     * @author 罗振
     */
    public function getRenovationCnAttribute()
    {
        if ($this->renovation == 1) {
            return '豪华装修';
        } elseif ($this->renovation == 2) {
            return '精装修';
        } elseif ($this->renovation == 3) {
            return '中装修';
        } elseif ($this->renovation == 4) {
            return '间装修';
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
        $data[] = $this->getPaymentTypeCnAttribute();
        $data[] = $this->getRenovationCnAttribute();
        return $data;
    }

}
