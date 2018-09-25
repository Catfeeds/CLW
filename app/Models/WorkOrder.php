<?php

namespace App\Models;

class WorkOrder extends BaseModel
{
    protected $connection = 'mysql';

    protected $guarded = [];

    protected $appends = ['source_cn', 'demand_cn', 'valid_cn', 'clinch_cn'];

    // 店长关联user表
    public function shopkeeperUser()
    {
        return $this->belongsTo(Agent::class,'shopkeeper_guid', 'guid');
    }

    // 业务员关联user表
    public function staffUser()
    {
        return $this->belongsTo(Agent::class,'staff_guid', 'guid');
    }

    // 来源 source_cn
    public function getSourceCnAttribute()
    {
        switch ($this->source) {
            case 1:
                return '400电话';
                break;
            case 2:
                return '官网客服';
                break;
            case 3:
                return '百度信息流';
            case 4:
                return '今日头条信息流';
                break;
            case 5:
                return 'app';
                break;
            case 6:
                return 'PC';
                break;
            case 7:
                return '微信';
            case 8:
                return '小程序';
            case 9:
                return '58同城';
                break;
            default;
                break;
        }
    }

    // 类型 demand_cn
    public function getDemandCnAttribute()
    {
        switch ($this->demand) {
            case 1:
                return '投放房源';
                break;
            case 2:
                return '委托找房';
                break;
            case 3:
                return '企业服务';
                break;
            case 4:
                return '其他';
            default;
                break;
        }
    }

    //工单状态 valid_cn
    public function getValidCnAttribute()
    {
        if ($this->valid == 1) {
            return '有效';
        } elseif ($this->valid == 2) {
            return '无效';
        }
    }

    //工单是否成交 clinch_cn
    public function getClinchCnAttribute()
    {
        if ($this->clinch == 1) {
            return '成交';
        } elseif ($this->clinch == 2) {
            return '未成交';
        }
    }
}
