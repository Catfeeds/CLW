<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use Illuminate\Http\Request;
use App\Handler\Common;

class PermissionsController extends APIBaseController
{
    public function index(Request $request)
    {
        if (empty(Common::user()->can('permission_list'))) {
            return $this->sendError('无中介系统权限列表权限','403');
        }
        $res = curl(config('setting.media_url').'/api/permissions/?per_page='.$request->per_page.'&page='.$request->page,'get');
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

    public function store(Request $request)
    {
        if (empty(Common::user()->can('add_permission'))) {
            return $this->sendError('无添加中介系统权限权限','403');
        }
        $data['name'] = $request->name;
        $data['label'] = $request->label;
        $data['group_id'] = $request->group_id;
        $res = curl(config('setting.media_url').'/api/permissions','post', $data);
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

    public function edit($id)
    {
        $res = curl(config('setting.media_url').'/api/permissions/'.$id.'/edit','get');
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

    public function update
    (
        $id,
        Request $request
    )
    {
        if (empty(Common::user()->can('update_permission'))) {
            return $this->sendError('无修改中介系统权限权限','403');
        }
        $data['name'] = $request->name;
        $data['label'] = $request->label;
        $data['group_id'] = $request->group_id;
        $data['_method'] = 'put';
        $res = curl(config('setting.media_url').'/api/permissions/'.$id,'post', $data);
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

    public function destroy($id)
    {
        if (empty(Common::user()->can('del_permission'))) {
            return $this->sendError('无删除中介系统权限权限','403');
        }
        $res = curl(config('setting.media_url').'/api/permissions/'.$id,'delete' );
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

    public function permissionsGroup()
    {
        $res = curl(config('setting.media_url').'/api/permissions_group','get' );
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }
}