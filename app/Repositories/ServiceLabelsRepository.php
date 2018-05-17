<?php

namespace App\Repositories;

use App\Models\ServiceLabel;
use Illuminate\Database\Eloquent\Model;

class ServiceLabelsRepository extends Model
{
    /**
     * 说明: 服务标签列表
     *
     * @return mixed
     * @author 罗振
     */
    public function serviceLabelList()
    {
        return ServiceLabel::paginate(10);
    }

    /**
     * 说明: 添加服务标签
     *
     * @param $request
     * @return mixed
     * @author 罗振
     */
    public function addServiceLabel($request)
    {
        return ServiceLabel::create([
            'name' => $request->name,
        ]);
    }

    /**
     * 说明: 修改服务标签
     *
     * @param $request
     * @param ServiceLabel $serviceLabel
     * @return bool
     * @author 罗振
     */
    public function updateServiceLabel(
        $request,
        ServiceLabel $serviceLabel
    )
    {
        $serviceLabel->name = $request->name;
        if (!$serviceLabel->save()) {
            return false;
        }

        return true;
    }
}