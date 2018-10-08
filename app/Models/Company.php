<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $connection = 'chulou-saas';

    protected $table = 'companies';

    protected $guarded = [];

}
