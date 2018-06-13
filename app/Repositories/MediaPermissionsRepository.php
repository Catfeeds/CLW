<?php

namespace App\Repositories;

use App\Models\MediaPermission;
use App\Models\MediaPermissionGroup;
use Illuminate\Database\Eloquent\Model;

class MediaPermissionsRepository extends Model
{
    public function mediaPermissionsList()
    {
        return MediaPermission::where(['guard_name' => 'web'])->paginate(10);
    }


    public function addMediaPermissions(
        $request
    )
    {
        return MediaPermission::create([
            'name' => $request->name,
            'label' => $request->label,
            'group_id' => $request->group_id,
            'guard_name' => 'web'
        ]);
    }

    public function updateMediaPermissions(
        $request,
        MediaPermission $mediaPermission
    )
    {
        $mediaPermission->name = $request->name;
        $mediaPermission->label = $request->label;
        $mediaPermission->group_id = $request->group_id;

        if (!$mediaPermission->save()) return false;
        return true;
    }

    public function getMediaPermissionGroup()
    {
        return MediaPermissionGroup::where(['stage' => 1])->get();
    }
}