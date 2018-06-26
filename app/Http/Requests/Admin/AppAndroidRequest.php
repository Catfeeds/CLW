<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AppAndroidRequest extends FormRequest
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
                    'appId' => 'required|max:32',
                    'stage' => 'required|numeric',
                    'version' => 'required|max:16',
                    'note' => 'required|max:200',
                    'url' => 'required|max:200',
                    'type' => [
                        'required',
                        Rule::in([1,2])
                    ]
                ];
            default;
                return [

                ];
        }
    }

}
