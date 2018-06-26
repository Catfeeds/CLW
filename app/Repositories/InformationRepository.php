<?php

namespace App\Repositories;

use App\Models\Information;
use Illuminate\Database\Eloquent\Model;

class InformationRepository extends Model
{
    public function informationList()
    {
        return Information::where([])->paginate(10);
    }
    
    public function addInformation(
        $request
    )
    {
        return Information::create([
            'banner' => $request->banner,
            'source' => $request->source,
            'title' => $request->title,
            'brief' => $request->brief,
            'content' => $request->content,
        ]);
    }

    public function updateInformation(
        $request,
        Information $information
    )
    {
        $information->banner = $request->banner;
        $information->source = $request->source;
        $information->title = $request->title;
        $information->brief = $request->brief;
        $information->content = $request->content;

        if (!$information->save()) return false;
        return true;
    }
}