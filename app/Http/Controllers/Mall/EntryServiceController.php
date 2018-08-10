<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntryServiceController extends Controller
{
   public function index()
   {
       return view('shop.list_clean');
   }

    public function water()
    {
        return view('shop.water');
    }

    public function houseMv()
    {
        return view('shop.list_moving');
    }
    public function protection()
    {
        return view('shop.protection');
    }
}
