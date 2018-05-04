<?php

namespace App\Models;

use App\Models\BaseModel;

class Banner extends BaseModel
{
    protected $casts = [
        'banner' => 'array',
    ];

}
