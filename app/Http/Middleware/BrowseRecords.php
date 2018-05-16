<?php

namespace App\Http\Middleware;

use App\Models\BrowseRecord;
use Carbon\Carbon;
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
        $user = Auth::guard('api')->user();

        //同一个用户不能重复添加浏览记录
        if (!empty($user) && empty($res = BrowseRecord::where(['user_id' => $user->id, 'house_id' => $house_id])->first())) {
            BrowseRecord::create(['user_id' => $user->id, 'house_id' => $house_id]);
        } elseif (!empty($user) && !empty($res = BrowseRecord::where(['user_id' => $user->id, 'house_id' => $house_id])->first())) {
            $res->updated_at = Carbon::now();
            $res->save();
        }
        return $next($request);
    }
}