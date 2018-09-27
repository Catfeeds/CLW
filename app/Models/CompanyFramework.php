<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyFramework extends Model
{
    protected $connection = 'saas';

    protected $table = 'company_frameworks';

    protected $guarded = [];
}
