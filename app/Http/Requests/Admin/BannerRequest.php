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
        $method = $this->route()->getActionMethod();

        switch ($method) {
            case 'store':
                return [
                    'banner' => 'required|array',
                ];
            case 'update':
                return [
                    'banner' => 'required|array',
                ];
                default;
                return [

                ];

        }
    }

}
