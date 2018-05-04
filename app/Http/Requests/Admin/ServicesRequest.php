<?php

namespace App\Http\Requests\Admin;

use App\Models\Storefront;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                    'storefront_name.not_in' => '门店名称不能重复',
                    'area_manager_id.in' => '区域经理必须存在'
                ];
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'area_manager_id.in' => '区域经理必须存在'
                    ];
                }
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

            case 'PUT':
                return [

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
}
