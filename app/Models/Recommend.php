<?php

namespace App\Models;

class Recommend extends BaseModel
{
    protected $casts = [
        'building_id' => 'array',
    ];
}
