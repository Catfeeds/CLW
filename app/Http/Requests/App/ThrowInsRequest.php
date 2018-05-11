<?php

namespace App\Http\Requests\App;

use Illuminate\Foundation\Http\FormRequest;


class ThrowInsRequest extends FormRequest
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
                    'tel.unique' => '不能重复投放房源'
                ];
            default;
                return [

                ];
        }
    }

    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'tel' => 'required|max:16|unique:throw_ins'
                ];
            case 'update':
                return [

                ];
            default;
                return [

                ];
        }
    }

}
