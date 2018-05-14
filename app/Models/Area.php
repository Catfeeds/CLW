<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    protected $guarded = [];

    protected $connection = 'media';

    // 城市
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    //楼盘
    public function building()
    {
        return $this->hasMany(Building::class);
    }

    public function block()
    {
        return $this->hasMany(Block::class);
    }
}
