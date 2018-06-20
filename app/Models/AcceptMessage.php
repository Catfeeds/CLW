<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcceptMessage extends Model
{
    protected $guarded = [];

    //关联消息类型
    public function message()
    {
        return $this->hasOne(MessageType::class,'type','id');
    }
}
