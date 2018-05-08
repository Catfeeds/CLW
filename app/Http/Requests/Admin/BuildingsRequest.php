<?php

namespace App\Http\Requests\Admin;

use App\Models\Building;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BuildingsRequest extends FormRequest
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
                    'building_id.in' => '楼盘必须存在',
                    'building_id.unique' => '一个楼盘只允许有一个标签'
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
                    'building_id' => [
                        'required',
                        'integer',
                        'unique:building_labels',
                        Rule::in(
                            Building::all()->pluck('id')->toArray()
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
