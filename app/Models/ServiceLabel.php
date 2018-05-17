<?php

namespace App\Models;

class ServiceLabel extends BaseModel
{
    //

    public function service()
    {
        return $this->hasMany('App\Models\Service','label_id','id');
    }

}
