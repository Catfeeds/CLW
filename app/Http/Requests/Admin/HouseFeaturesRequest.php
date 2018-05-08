<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HouseFeaturesRequest extends FormRequest
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
                    'name.unique' => '特色名称不能重复添加'
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

    /**
     * 说明: 字段验证
     *
     * @return array
     * @author 刘坤涛
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|max:32|unique:house_features',
                    'weight' => 'required|integer',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|max:32',
                    'weight' => 'required|integer'
                ];
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                }
        }
    }
}
