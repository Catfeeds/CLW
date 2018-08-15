<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyDecoratController extends Controller
{
    public function index(Request $request)
    {
        return view('shop.serviceList', ['id'=>$request->id]);
    }
}
