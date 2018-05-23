<?php

namespace App\Http\Controllers\We;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FindHouseController extends Controller
{
    public function index()
    {
       return view('we.user_find_house');
    }
}
