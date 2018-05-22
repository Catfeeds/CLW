<?php

namespace App\Http\Controllers\We;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HouseController extends Controller
{
    public function show($id)
    {
        return view('we.house_detail');
    }
}
