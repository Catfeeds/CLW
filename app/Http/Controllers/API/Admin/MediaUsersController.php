<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\MediaUsersRepository;
use Illuminate\Http\Request;

class MediaUsersController extends APIBaseController
{
    public function index(
        MediaUsersRepository $repository
    )
    {
        $res = $repository->getMediaUsersList();
        return $this->sendResponse($res,'获取中介用户列表成功');
    }

    public function update(
        $id,
        Request $request,
        MediaUsersRepository $repository
    )
    {
        $res = $repository->updateUser($id, $request);
        if (empty($res)) return $this->sendError('修改用户角色失败');
        return $this->sendResponse($res,'修改用户角色成功');
    }


}