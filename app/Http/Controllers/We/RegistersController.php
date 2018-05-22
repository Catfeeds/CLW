<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChat\RegistersRequest;
use App\Services\RegistersService;

class RegistersController extends Controller
{

    public function store(
        RegistersRequest $request,
        RegistersService $registersService
    )
    {
        dd(123123);
        $result = $registersService->weAddUser($request);

    }
}