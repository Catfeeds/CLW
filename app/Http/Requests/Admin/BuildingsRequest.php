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
        switch ($this->route()->getActionMethod()) {
            case 'addBuildingLabel':
                    return [
                        'building_guid.unique' => '一个楼盘只允许有一个标签',
                        'building_guid.in' => '楼盘必须存在'
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
        switch ($this->route()->getActionMethod()) {
            case 'addBuildingLabel':
                return [
                    'building_guid' => [
                        'required',
                        'max:32',
                        'unique:building_labels',
                        Rule::in(
                            Building::all()->pluck('guid')->toArray()
                        )
                    ]
                ];
            default;
                return [

                ];
        }
    }

}
