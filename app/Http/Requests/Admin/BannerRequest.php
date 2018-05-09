<?php

namespace App\Http\Requests\Admin;

use App\Models\Banner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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

    public function messages()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'banner.not_in' => 'banner不能重复添加',
                ];
        }
    }

    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'banner' => [
                        'required',
                        'array',
                    ]

                ];
            case 'update':
                return [
                    'banner' => [
                        'required',
                        'array'
                    ]
                ];
            default;
                return [

                ];
        }
    }

}
