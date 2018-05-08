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
                    'house_id.in' => '房源必须存在',
                    'house_id.unique' => '一个房源只允许有一个标签'
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
                    'house_id' => [
                        'required',
                        'integer',
                        'unique:house_labels',
                        Rule::in(
                            OfficeBuildingHouse::all()->pluck('id')->toArray()
                        )
                    ]
                ];
            case 'update':
            default;
                return [

                ];
        }
    }

}
