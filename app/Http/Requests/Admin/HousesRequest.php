<?php

namespace App\Http\Requests\Admin;

use App\Models\OfficeBuildingHouse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HousesRequest extends FormRequest
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

    public function messages()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'house_id.exists' => '房源必须存在'
                ];
            case 'showHouse':
                return [
                    'house_id.exists' => '房源必须存在'
                ];
            case 'PATCH':
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                }
        }
    }

    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'house_id' => 'required|integer|exists:media.office_building_houses,id',
                ];
            case 'showHouse':
                return [
                    'house_id' => 'required|integer|exists:media.office_building_houses,id',
                ];
            default;
                return [

                ];
        }
    }

}
