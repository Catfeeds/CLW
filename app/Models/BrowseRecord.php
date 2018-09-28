<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrowseRecord extends Model
{
    protected $guarded = [];

    public function houses()
    {
        return $this->belongsTo(Houses::class, 'house_id', 'id');
    }

}
