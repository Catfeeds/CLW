<?php

namespace App\Http\Requests\Admin;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRecommendsRequest extends FormRequest
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
                    'service_id.unique' => '服务已存在,请勿重复添加',
                    'service_id.in' => '服务必须存在',
                ];
            case 'PUT':
            case 'PATCH':
            return [
                'service_id.in' => '服务必须存在'
            ];
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
                    'service_id' => [
                        'required',
                        'integer',
                        'unique:service_recommends',
                        Rule::in(
                            Service::all()->pluck('id')->toArray()
                        )
                    ],
                    'pic' => 'required|max:128',
                    'weight' => 'required|integer'
                ];
            case 'PUT':
            case 'PATCH':
            return [
                'service_id' => [
                    'required',
                    'integer',
                    Rule::in(
                        Service::all()->pluck('id')->toArray()
                    )
                ],
                'pic' => 'required|max:128',
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
