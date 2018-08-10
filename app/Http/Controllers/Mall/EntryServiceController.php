<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntryServiceController extends Controller
{
   public function index(Request $request)
   {
       return view('shop.serviceList', ['serveid'=>$request->id]);
   }
}
