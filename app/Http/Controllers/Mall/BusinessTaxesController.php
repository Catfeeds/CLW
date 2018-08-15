<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessTaxesController extends Controller
{
    public function index(Request $request)
    {
        return view('shop.serviceList', ['finance'=>$request->id]);
    }

    // public function show($id)
    // {
    //     if($id==='1')
    //     return view('shop.list_charge');
    //     else
    //     return view('shop.'.$id);
    // }

    // public function regist()
    // {
    //     return view('shop.list_register');
    // }
}
