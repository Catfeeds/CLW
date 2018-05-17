<?php

namespace App\Http\Requests\App;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                    'smsCode' => 'required|max:4'
                ];
            case 'resetTel':
                return [
                    'tel' => [
                        'required',
                        'max:16',
                    ],
                    'smsCode' => 'required|max:4'
                ];
            default;
                return [

                ];
        }
    }

}
