<?php

namespace App\Http\Requests\App;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CollectionsRequest extends FormRequest
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
                    'house_id.exists' => '房源必须存在',
                    'house_id.unique' => '不能重复收藏'
                ];
        }
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
                    'house_id' => [
                        'required',
                        'exists:media.office_building_houses,id',
                        Rule::unique('collections')->where('user_id', Auth::guard('api')->user()->id)
                    ]
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
