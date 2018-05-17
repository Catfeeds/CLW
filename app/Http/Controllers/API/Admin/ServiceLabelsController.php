<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\ServiceLabelsRequest;
use App\Repositories\ServiceLabelsRepository;

class ServiceLabelsController extends APIBaseController
{
    public function store(
        ServiceLabelsRequest $request,
        ServiceLabelsRepository $repository
    )
    {
        $repository->addServiceLabel($request);




    }
}
