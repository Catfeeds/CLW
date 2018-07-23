<?php

namespace App\Http\Requests\App;

use Illuminate\Foundation\Http\FormRequest;


class BespeaksRequest extends FormRequest
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
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'tel.regex' => '请输入正确的手机号'
                ];
            default;
                return [

                ];
        }
    }

    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'tel' => 'required|max:16|regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',
                    'appellation' => 'nullable|max:32',
                    'demand' => 'nullable'
                ];
            default;
                return [

                ];
        }
    }

}
