<?php

namespace App\Http\Middleware;

use App\Models\BrowseRecord;
use Closure;
use Illuminate\Support\Facades\Auth;

class BrowseRecords
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $house_id = $request->route('office_building_house')->id;
        $user_id = Auth::guard('api')->user()->id;
        //同一个用户不能重复添加浏览记录
        if (empty(BrowseRecord::where(['user_id' => $user_id, 'house_id' => $house_id])->first())) {
            BrowseRecord::create(['user_id' => $user_id, 'house_id' => $house_id]);
        }
        return $next($request);
    }
}
