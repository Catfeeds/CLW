<?php

namespace App\Http\Controllers\Pc;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class LoginsController extends Controller
{

    public function index()
    {
        return view('home.login');
    }
    
    //登录
    public function store(Request $request)
    {
        $res = User::where('tel', $request->tel)->first();
        if (Hash::check($request->password,$res->password)) {
            session(['user' => $res]);
            return '登录成功';
        } else {
            return '登录失败';
        }
    }

    //退出
    public function logout()
    {
        if (session()->has('user')) {
            session()->flush('user');
            return '退出成功';
        }
    }

}
