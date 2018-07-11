<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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

    /**说明：验证规则
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'name' => 'required|max:32|unique:categories',
                    'route' => 'required|max:32|unique:categories'
                ];
            case 'update':
                return [
                    'name' => 'required|max:32|unique:categories,name,'.$this->route('category')->id,
                    'route' => 'required|max:32|unique:categories,route,'.$this->route('category')->id
                ];
            default;
                return [

                ];
        }
    }
}
