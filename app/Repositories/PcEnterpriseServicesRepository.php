<?php

namespace App\Repositories;

use App\Models\PcEnterpriseService;
use Illuminate\Database\Eloquent\Model;

class PcEnterpriseServicesRepository extends Model
{
    public function getList()
    {
        return PcEnterpriseService::all();
    }

    public function addService($request)
    {
        return PcEnterpriseService::create([
            'master_title' => $request->master_title,
            'vice_title' => $request->vice_title,
            'img' => $request->img,
            'url' => $request->url
        ]);
    }

    public function updateService($pcEnterpriseService, $request)
    {
        $pcEnterpriseService->master_title = $request->master_title;
        $pcEnterpriseService->vice_title = $request->vice_title;
        $pcEnterpriseService->img = $request->img;
        $pcEnterpriseService->url = $request->url;
        if (!$pcEnterpriseService->save()) return false;
        return true;
    }
}