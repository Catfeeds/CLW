<?php

namespace App\Http\Requests\Admin;

use App\Models\ServiceLabel;
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
                    'label_id.in' => '服务标签必须存在'
                ];
            case 'PATCH':
                return [
                    'label_id.in' => '服务标签必须存在'
                ];
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
                    'weight' => 'required|integer',
                    'shelf' => 'required|integer',
                    'show' => 'required|integer',
                    'icon' => 'required',
                    'detail' => 'required|array',
                    'label_id' => [
                        'required',
                        'integer',
                        Rule::in(
                            ServiceLabel::all()->pluck('id')->toArray()
                        )
                    ]
                ];
            case 'PATCH':
                return [
                    'name' => 'required|max:32',
                    'weight' => 'required|integer',
                    'shelf' => 'required|integer',
                    'show' => 'required|integer',
                    'icon' => 'required',
                    'detail' => 'required|array',
                    'label_id' => [
                        'required',
                        'integer',
                        Rule::in(
                            ServiceLabel::all()->pluck('id')->toArray()
                        )
                    ]
                ];
            default:
                {
                    return [];
                }
        }
    }
}
