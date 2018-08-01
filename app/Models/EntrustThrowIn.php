<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntrustThrowIn extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';
    use SoftDeletes;

    protected $appends = ['demand_cn', 'source_cn'];

    //需求类型
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
               break;
               default;
               break;
       }
    }

    //数据来源
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
                return '商城';
                break;
            default;
                break;
        }
    }
}
