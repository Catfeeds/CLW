<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LabelsRequest extends FormRequest
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
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'category_id' => 'required|exists:categories,id',
                    'parent_id' => 'required|integer',
                    'name' => 'required|unique:labels,name|max:32',
                    'stage' => 'required|integer'
                ];
            case 'update':
                return [
                    'category_id' => 'required|exists:categories,id',
                    'parent_id' => 'required|integer',
                    'name' => 'required|max:32|unique:labels,name,'. $this->route('label')->id,
                ];
            default;
                return [

                ];
        }
    }
}
