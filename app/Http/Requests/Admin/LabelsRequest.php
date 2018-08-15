<?php

namespace App\Http\Requests\Admin;

use App\Models\Label;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                    'parent_id' => 'nullable|integer',
                    'stage' => 'required|integer',
                    'name' => [
                        'required',
                        'max:32',
                        Rule::notIn(
                            Label::where('category_id', $this->category_id)->pluck('name')->toArray()
                        )
                    ],
                ];
            case 'update':
                return [
                    'category_id' => 'required|exists:categories,id',
                    'parent_id' => 'nullable|integer',
                    'stage' => 'required|integer',
                    'name' => [
                        'required',
                        'max:32',
                        Rule::notIn(
                            Label::where('category_id', $this->category_id)->where('name', '!=',$this->name)->pluck('name')->toArray()
                        )
                    ],

                ];
            default;
                return [

                ];
        }
    }
}
