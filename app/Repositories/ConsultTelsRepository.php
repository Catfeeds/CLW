<?php

namespace App\Repositories;

use App\Models\ConsultTel;
use Illuminate\Database\Eloquent\Model;

class ConsultTelsRepository extends Model
{
    /**
     * 说明: 咨询统计添加
     *
     * @param $request
     * @param $user
     * @param $source
     * @return mixed
     * @author 罗振
     */
    public function addConsulTels(
        $request,
        $user,
        $source
    )
    {
        return ConsultTel::create([
            'user_id' => empty($user)?'':$user->id,
            'source' => $source,
            'page_source' => $request->page_source
        ]);
    }
}