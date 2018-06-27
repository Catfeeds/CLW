<?php

namespace App\Http\Requests\Pc;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
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
                    'tel' => [
                        'required',
                        Rule::in(
                            User::all()->pluck('tel')->toArray()
                        )
                    ],
                    'password' => 'required|min:6|max:18',
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
