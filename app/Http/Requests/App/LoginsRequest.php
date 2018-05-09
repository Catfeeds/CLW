<?php

namespace App\Http\Requests\App;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginsRequest extends FormRequest
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
                    'tel.in' => '手机号必须存在'
                ];
            case 'smsCode':
                return [
                    'tel.in' => '手机号必须存在'
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
                    'tel' => [
                        'required',
                        'max:16',
                        Rule::in(
                            User::all()->pluck('tel')->toArray()
                        )
                    ],
                    'password' => 'required|min:6|max:18',
                ];
            case 'smsCode':
                return [
                    'tel' => [
                        'required',
                        'max:16',
                        Rule::in(
                            User::all()->pluck('tel')->toArray()
                        )
                    ],
                    'smsCode' => 'required|numeric|max:9999',
                ];
            default;
                return [

                ];
        }
    }

}
