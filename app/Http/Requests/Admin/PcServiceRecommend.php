<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PcServiceRecommend extends FormRequest
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
     * 说明：验证规则
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author 郑宇
     */
    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'url' => 'required'
                ];
            case 'update':
                return [
                    'url' => 'required'
                ];
            default;
                return [

                ];
        }

    }
}
