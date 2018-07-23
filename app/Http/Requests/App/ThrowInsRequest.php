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
                    'area_id.exists' =>'区域不存在',
//                    'block_id.exists' => '商圈不存在',
                    'tel.regex' => '请输入正确的手机号'
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
                    'tel' => 'required|max:16||regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',
                    'appellation' => 'nullable|max:32',
                    'area_id' => 'nullable|exists:media.areas,id',
                    'block_id' => 'nullable|exists:media.blocks,id',
                    'acreage' => 'nullable',
                    'building_name' => 'nullable|max:32'
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
