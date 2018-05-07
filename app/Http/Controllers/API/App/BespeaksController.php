<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\App\BespeaksRequest;
use App\Services\BespeaksService;

class BespeaksController extends APIBaseController
{
    public function store(
        BespeaksRequest $request,
        BespeaksService $bespeaksService
    )
    {
        $bespeaksService->addBespeaks($request);

    }
}
