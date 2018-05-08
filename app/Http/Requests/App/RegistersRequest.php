<?php

namespace App\Http\Requests\App;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class RegistersRequest extends FormRequest
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
                        'max:16',
                        Rule::in(
                            User::all()->pluck('tel')->toArray()
                        )
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
