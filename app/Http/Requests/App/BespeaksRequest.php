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

    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'tel' => 'required|max:16',
                    'appellation' => 'nullable|max:32',
                    'demand' => 'nullable'
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
