<?php

namespace App\Http\Controllers\We;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuildingController extends Controller
{
    public function index()
    {
        return view('we.building_list');
    }

    public function show()
    {
        return view('we.building_detail');
    }
}
