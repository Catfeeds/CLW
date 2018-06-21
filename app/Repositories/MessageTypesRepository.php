<?php

namespace App\Repositories;

use App\Models\MessageType;
use Illuminate\Database\Eloquent\Model;

class MessageTypesRepository extends Model
{
    public function getList($request)
    {
        return MessageType::paginate($request->per_page);
    }

    public function addMessage($request)
    {
        return MessageType::create([
            'name' => $request->name
        ]);
    }

    public function updateMessage($messageType, $request)
    {
        $messageType->name = $request->name;
        if (!$messageType->save()) return false;
        return true;
    }
}