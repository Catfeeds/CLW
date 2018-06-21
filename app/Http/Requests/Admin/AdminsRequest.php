<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminsRequest extends FormRequest
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

    /**
     * 说明: 提示
     *
     * @return array
     * @author 罗振
     */
    public function messages()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'name.not_in' => '手机号不能重复'
                ];
            default;
                return [

                ];
        }
    }

    /**
     * 说明: 验证规则
     *
     * @return array
     * @author 罗振
     */
    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'nick_name' => 'required|max:32',
                    'name' => [
                        'required',
                        'max:16',
                        Rule::notIn(
                            Admin::all()->pluck('name')->toArray()
                        )
                    ],
                    'password' => 'required|min:6|max:18',
                ];
            default;
                return [

                ];
        }
    }

}
