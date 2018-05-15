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
        switch ($this->method()) {
            case 'POST':
                return [
                    'house_id.unique' => '不能重复添加标签',
                    'house_id.exists' => '房源必须存在'
                ];
            case 'PUT':
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'house_id' => 'required|integer|unique:house_labels|exists:media.office_building_houses,id'
                ];
            case 'update':
            default;
                return [

                ];
        }
    }

}
