<?php

namespace App\Repositories;

use App\Models\ServiceLabel;
use Illuminate\Database\Eloquent\Model;

class ServiceLabelsRepository extends Model
{
    public function serviceLabelList()
    {
        return ServiceLabel::paginate(10);
    }

    public function addServiceLabel($request)
    {
        return ServiceLabel::create([
            'name' => $request->name,
        ]);
    }

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