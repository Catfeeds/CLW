<?php

namespace App\Models;

class Service extends BaseModel
{
    protected $casts = [
        'detail' => 'array',
    ];
}
