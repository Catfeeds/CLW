<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\PermissionsRequest;
use App\Repositories\PermissionsRepository;

class PermissionsController extends APIBaseController
{
    public function store(
        PermissionsRequest $request,
        PermissionsRepository $repository
    )
    {



    }


}