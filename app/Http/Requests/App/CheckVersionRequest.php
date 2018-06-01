<?php

namespace App\Http\Requests\App;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CheckVersionRequest extends FormRequest
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

    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'appId' => 'required',
                    'version' => 'required',
                    'type' => [
                        'required',
                        Rule::in(['ios', 'android'])
                    ],
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
