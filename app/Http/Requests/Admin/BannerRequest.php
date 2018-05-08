<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
                    'banner' => 'required|max:32',
                ];
            case 'update':
                return [
                    'banner' => 'required|max:32',
                ];
            default;
                return [

                ];
        }
    }

}
