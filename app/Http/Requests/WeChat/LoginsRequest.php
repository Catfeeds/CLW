<?php

namespace App\Http\Requests\WeChat;

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
                    'tel.in' => '手机号必须存在',
                    'password.min' => '密码最小长度为6位',
                    'password.max' => '密码最大长度为18位'
                ];
            case 'quickLogin':
                return [
                    'tel.in' => '手机号必须存在',
                    'smsCode.numeric' => '验证码必须为数字',
                    'smsCode.max' => '验证码长度过长'
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
            case 'quickLogin':
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
