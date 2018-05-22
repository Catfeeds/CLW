<?php

namespace App\Http\Controllers\We;

use App\Services\ServicesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class ServerController extends Controller
{


    public function index
    (
        ServicesService $servicesService
    )
    {
        $res = $servicesService->allService();
        return view('we.server_index', ['res' => $res]);
    }

    public function show(
        $id
    )
    {
        $service = Service::find($id);
        return view('we.server_detail', ['res' => $service]);
    }

    public function map() {
        return view('we.map');
    }
}
