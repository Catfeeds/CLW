<?php

namespace App\Repositories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class ServicesRepositories extends Model
{

    private $model;

    public function __construct(Service $model)
    {
        $this->model = $model;
    }


}