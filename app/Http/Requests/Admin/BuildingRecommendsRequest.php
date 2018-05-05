<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class BuildingRecommendsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'building_id' => 'required|integer',
                    'img' => 'required|string|max:128',
                ];
            case 'update':
                return [
                    'building_id' => 'required|integer',
                    'img' => 'required|string|max:128',
                ];
            default;
                return [

                ];
        }
    }

}

