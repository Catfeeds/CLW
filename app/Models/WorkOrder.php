<?php

namespace App\Models;

class WorkOrder extends BaseModel
{

    // 如果使用的是非递增或者非数字的主键，则必须在模型上设置
    public $incrementing = false;

    // 主键
    protected $primaryKey = 'guid';

    // 主键类型
    protected $keyType = 'string';

    protected $connection = 'mysql';

    protected $appends = [
        'source_cn',
        'demand_cn'
    ];

    // 工单关联进度
    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'work_order_guid', 'guid')->latest('created_at');
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
            case 10:
                return '360';
                break;
            case 11:
                return '搜狗';
                break;
            case 12:
                return '神马';
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

}
