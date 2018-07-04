<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PcEnterpriseServicesRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'master_title' => 'required',
                    'vice_title' => 'required',
                    'url' => 'required'
                ];

            case 'PATCH':
                return [
                    'master_title' => 'required',
                    'vice_title' => 'required',
                    'url' => 'required'
                ];
            default;
                return [

                ];

        }

    }
}
