<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
                    'name' => 'required|max:32',
                    'sort' => 'integer',
                    'shelf' => 'integer',
                    'show' => 'integer',
                    'icon' => 'required',
                    'detail' => 'required|array'
                ];
            case 'PUT':
            case 'PATCH':
            return [
                'name' => 'required|max:32',
                'sort' => 'integer',
                'shelf' => 'integer',
                'show' => 'integer',
                'icon' => 'required',
                'detail' => 'required|array'
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
