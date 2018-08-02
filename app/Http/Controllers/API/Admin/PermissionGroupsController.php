<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use Illuminate\Http\Request;
use App\Handler\Common;

class PermissionGroupsController extends APIBaseController
{
    public function index(Request $request)
    {
        if (empty(Common::user()->can('permission_groups_list'))) {
            return $this->sendError('无中介系统权限组列表权限','403');
        }
        $res = curl(config('setting.media_url').'/api/permission_groups/?per_page='.$request->per_page.'&page='.$request->page,'get');
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

    public function store(Request $request)
    {
        if (empty(Common::user()->can('add_permission_groups'))) {
            return $this->sendError('无添加中介系统权限组权限','403');
        }
        $data['group_name'] = $request->group_name;
        $data['stage'] = 1;
        $res = curl(config('setting.media_url').'/api/permission_groups','post',$data);
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }
}