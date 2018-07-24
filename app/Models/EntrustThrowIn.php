<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntrustThrowIn extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';
    use SoftDeletes;

    protected $appends = ['type_cn', 'source_cn'];

    //需求类型
    public function getTypeCnAttribute()
    {
       switch ($this->type) {
           case 1:
               return '委托找房';
               break;
           case 2:
               return '投放房源';
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

    public function getSourceCnAttribute()
    {
        switch ($this->source) {
            case 1:
                return 'APP';
                break;
            case 2:
                return 'PC';
                break;
            case 3:
                return '微信';
                break;
            case 4:
                return '小程序';
                break;
            case 5:
                return '官网客服';
                break;
            case 6:
                return '百度信息流';
                break;
                case 7;
                return '今日头条信息流';
                break;
                default;
                break;
        }
    }
}
