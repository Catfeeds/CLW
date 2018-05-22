<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChat\RegistersRequest;
use App\Services\RegistersService;

class RegistersController extends Controller
{

    public function index()
    {
        return '注册';
    }

    public function store(
        RegistersRequest $request,
        RegistersService $registersService
    )
    {
        $result = $registersService->weAddUser($request);


        return view('注册');

    }
}