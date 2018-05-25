<?php

namespace App\Http\Requests\WeChat;

use Illuminate\Foundation\Http\FormRequest;

class ResetInfoRequest extends FormRequest
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
            case 'resetPwd':
                return [

                ];
            case 'oldTelValidate':
                return [
                    'smsCode.numeric' => '验证码必须为数字',
                    'smsCode.max' => '验证码长度过长'
                ];
            case 'resetTel':
                return [
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
            case 'resetPwd':
                return [
                    'old_pwd' => 'required|min:6|max:18',
                    'new_pwd' => 'required|min:6|max:18',
                ];
            case 'oldTelValidate':
                return [
                    'tel' => [
                        'required',
                        'max:16',
                    ],
                    'smsCode' => 'required|numeric|max:9999',
                ];
            case 'resetTel':
                return [
                    'tel' => [
                        'required',
                        'max:16',
                    ],
                    'smsCode' => 'required|numeric|max:9999',
                ];
            default;
                return [

                ];
        }
    }

}
