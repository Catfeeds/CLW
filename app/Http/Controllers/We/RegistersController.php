<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChat\RegistersRequest;
use App\Services\RegistersService;
use Illuminate\Support\Facades\Session;

class RegistersController extends Controller
{

    public function index()
    {
        dd(Session::get('a'));
        return '注册';
    }

    public function create()
    {
        return view('we.register');
    }

    public function store(
        RegistersRequest $request,
        RegistersService $registersService
    )
    {
        $result = $registersService->weAddUser($request);
        dd($result);

        return '注册';

    }
}