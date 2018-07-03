<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use Illuminate\Http\Request;

class PermissionGroupsController extends APIBaseController
{
    public function index(Request $request)
    {
        $res = curl(config('setting.media_url').'/api/permission_groups/?per_page='.$request->per_page,'get');
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

    public function store(Request $request)
    {
        $data['group_name'] = $request->group_name;
        $data['stage'] = 1;
        $res = curl(config('setting.media_url').'/api/permission_groups','post',$data);
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }
}