<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table = 'blocks';

    protected $guarded = [];

    protected $connection = 'media';

    public function area()
    {
        return $this->belongsTo('App\Models\Area','area_id','id');
    }

    public function building()
    {
        return $this->hasMany('App\Models\Building','block_id', 'id');
    }

}
