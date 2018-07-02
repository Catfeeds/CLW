<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use Illuminate\Http\Request;

class PermissionsController extends APIBaseController
{
    public function index()
    {
        $res = curl(config('setting.media_url').'/api/permissions','get');
        if (empty($res->data)) return $this->sendError($res->message);
        return $this->sendResponse($res->data,$res->message);
    }

    public function store(Request $request)
    {
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