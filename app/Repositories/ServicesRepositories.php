<?php

namespace App\Repositories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class ServicesRepositories extends Model
{

    private $model;

    public function __construct(Service $model)
    {
        $this->model = $model;
    }


    /**
     * 说明:添加服务
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function addService($request)
    {
        return $this->model->create([
            'name' => $request->name,
            'sort' => $request->sort,
            'shelf' => $request->shelf,
            'show' => $request->show,
            'icon' => $request->icon,
            'detail' => $request->detail
        ]);
    }


}