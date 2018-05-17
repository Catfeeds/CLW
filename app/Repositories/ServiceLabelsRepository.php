<?php

namespace App\Repositories;

use App\Models\ServiceLabel;
use Illuminate\Database\Eloquent\Model;

class ServiceLabelsRepository extends Model
{
    public function addServiceLabel($request)
    {
        return ServiceLabel::create([
            'name' => $request->name,
            'service_id' => $request->service_id
        ]);


    }


}