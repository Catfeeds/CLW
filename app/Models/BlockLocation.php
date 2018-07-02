<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockLocation extends Model
{
    protected $table = 'block_locations';

    protected $guarded = [];

    protected $connection = 'media';

    public function block()
    {
        return $this->belongsTo('App\Models\Block','block_id', 'id');
    }

}
