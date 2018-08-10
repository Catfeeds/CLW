<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinanceController extends Controller
{
   public function index()
   {
       return view('shop.finance');
   }
}
