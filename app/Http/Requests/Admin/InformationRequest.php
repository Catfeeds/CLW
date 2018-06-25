<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
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
     * 说明: 提示
     *
     * @return array
     * @author 罗振
     */
    public function messages()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [

                ];
            default;
                return [

                ];
        }
    }

    /**
     * 说明: 验证规则
     *
     * @return array
     * @author 罗振
     */
    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'banner' => 'required|min:5|max:250',
                    'source' => 'required|min:1|max:100',
                    'title' => 'required|max:150',
                    'brief' => 'required|min:10|max:150',
                    'content' => 'required|max:4294967296',
                ];
            case 'update':
                return [
                    'banner' => 'required|min:5|max:250',
                    'source' => 'required|min:1|max:100',
                    'title' => 'required|max:150',
                    'brief' => 'required|min:10|max:150',
                    'content' => 'required|max:4294967296',
                ];
            default;
                return [

                ];
        }
    }

}
