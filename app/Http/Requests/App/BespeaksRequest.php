<?php

namespace App\Http\Requests\App;

use App\Models\Bespeak;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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
                    'tel.regex' => '请输入正确的手机号',
                    'tel.not_in' => '一天之内不能重复投放'
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
                    'tel' => [
                        'required',
                        'max:16',
                        'regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',
                        Rule::notIn(
                            Bespeak::whereBetween('created_at',[date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',
                                time())])->pluck('tel')->toArray()
                        )
                        ],
                    'appellation' => 'nullable|max:32',
                    'demand' => 'nullable'
                ];
            default;
                return [

                ];
        }
    }

}
