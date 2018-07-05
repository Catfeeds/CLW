<?php

namespace App\Http\Controllers\PC;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginsController extends Controller
{
    //登录
    public function store(Request $request)
    {
        $res = User::where('tel', $request->tel)->first();
        if (Hash::check($request->password,$res->password)) {
            session(['user' => $res]);
            return $this->sendResponse($res, '登录成功');
        } else {
            return $this->sendError('登录失败');
        }
    }

    //退出
    public function logout()
    {
        if (session()->has('user')) {
            session()->flush('user');
        }
        return redirect()->back();
    }

}
