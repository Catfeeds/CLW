<?php

namespace App\Http\Controllers\We;

use App\Services\ServicesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServerController extends Controller
{

    public function index
    (
        ServicesService $servicesService
    )
    {
        $res = $servicesService->allService();
//        dd($res->toArray());
        return view('we.server_index', ['res' => $res->toArray()]);
    }
}
