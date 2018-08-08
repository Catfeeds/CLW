<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessTaxesController extends Controller
{
    public function index()
    {
        dd('工商财税列表');
    }

    public function show()
    {
        return view('shop.list_charge');
    }

    public function regist()
    {
        return view('shop.list_register');
    }
}
