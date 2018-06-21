<?php

namespace App\Repositories;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MediaUsersRepository extends Model
{
    public function getMediaUsersList()
    {
        return User::where([])->paginate(10);
    }


    public function updateUser(
        $id,
        $request
    )
    {
        \DB::connection('media')->beginTransaction();
        try {
            $user = User::find($id);
            $user->level = $request->level;
            if (!$user->save()) throw new \Exception('用户角色修改失败');

            // 组长权限跟业务员一样
            if ($request->level == 5) {
                $request->level = 4;
            }

            $user->syncRoles($request->level);
            \DB::connection('media')->commit();
            return true;
        } catch (\Exception $exception) {
            \DB::connection('media')->rollBack();
            \Log::error($exception->getMessage());
            return false;
        }

    }

}