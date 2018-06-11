<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Jobs\SlowQuery;
use Illuminate\Http\Request;

class QueryController extends APIBaseController
{
    /**
     * 说明: 将慢查询接口存入数据库
     *
     * @param Request $request
     * @return string
     * @author 刘坤涛
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $this->dispatch(new SlowQuery($data));
    }
}
