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
                       'building_id.unique' => '一个楼盘只允许有一个标签',
                        'building_id.in' => '楼盘必须存在'
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
            case 'store':
                return [
                    'name' => 'required|max:128',
                    'gps' => 'required',
                    'type' => 'required|numeric|max:100',

                    'area_id' => 'required:numeric',
                    'block_id' => 'nullable|numeric',
                    'address' => 'required|max:128',

                    'developer' => 'nullable|max:128',
                    'years' => 'nullable|numeric|max:10000',
                    'acreage' => 'nullable|numeric|max:99999999999',
                    'building_block_num' => 'nullable|numeric|max:10000',
                    'parking_num' => 'nullable|numeric|max:10000',
                    'parking_fee' => 'nullable|numeric|max:10000',
                    'greening_rate' => 'nullable|numeric|max:100',

                    'company' => 'array',
                    'album' => 'array',
                    'building_block' => 'array',
                    'building_feature' => 'array'
                ];

            case 'update':
                return [
                    'name' => 'required|max:128',
                    'gps' => 'required',
                    'type' => 'required|numeric|max:100',

                    'area_id' => 'required:numeric',
                    'block_id' => 'nullable|numeric',
                    'address' => 'required|max:128',

                    'developer' => 'nullable|max:128',
                    'years' => 'nullable|numeric|max:10000',
                    'acreage' => 'nullable|numeric|max:99999999999',
                    'building_block_num' => 'nullable|numeric|max:10000',
                    'parking_num' => 'nullable|numeric|max:10000',
                    'parking_fee' => 'nullable|numeric|max:10000',
                    'greening_rate' => 'nullable|numeric|max:100',

                    'company' => 'array',
                    'album' => 'array',
                    'building_feature' => 'array'
                ];
            case 'addBuildingLabel':
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
            default;
                return [

                ];
        }
    }

}