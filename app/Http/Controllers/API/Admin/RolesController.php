<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\RolesRequest;
use App\Models\Role;
use App\Repositories\RolesRepository;
use Illuminate\Http\Request;
use App\Handler\Common;

class RolesController extends APIBaseController
{
    public function index()
    {
        if (empty(Common::user()->can('role_list'))) {
            return $this->sendError('无role_list权限','403');
        }
        $res = curl(config('setting.media_url').'/api/roles','get');
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

    public function store(Request $request)
    {
        if (empty(Common::user()->can('add_role'))) {
            return $this->sendError('无add_role权限','403');
        }
        $data['name'] = $request->name_en;
        $data['name_cn'] = $request->name_cn;
        $data['name_en'] = $request->name_en;
        $data['permissions'] = json_encode($request->permissions);
        $res = curl(config('setting.media_url').'/api/roles','post', $data);
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

    public function edit($id)
    {
        $res = curl(config('setting.media_url').'/api/roles/'.$id.'/edit','get');
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

    public function update(
        $id,
        Request $request
    )
    {
        if (empty(Common::user()->can('update_role'))) {
            return $this->sendError('无update_role权限','403');
        }
        $data['name'] = $request->name_en;
        $data['name_cn'] = $request->name_cn;
        $data['name_en'] = $request->name_en;
        $data['permissions'] = json_encode($request->permissions);
        $data['_method'] = 'put';
        $res = curl(config('setting.media_url').'/api/roles/'.$id,'post', $data);
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

    // 获取所有权限
    public function getAllPermissions()
    {
        $res = curl(config('setting.media_url').'/api/get_all_permissions','get');
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

}