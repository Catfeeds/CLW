<?php

namespace App\Http\Controllers\We;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
       return view('we.user_index');
    }
}
