<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Models\QueryTime;
use Illuminate\Http\Request;

class QueryController extends APIBaseController
{

    public function create(Request $request)
    {
        return QueryTime::create([
            'app_name' => $request->app_name,
            'url' => $request->url,
            'time' => $request->time
        ]);
    }
}
