<?php

namespace App\Http\Requests\Admin;

use App\Models\Computer;
use App\Models\Label;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ComputersRequest extends FormRequest
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
            case 'store': {
                return [
                    'name.not_in' => '该名称已存在',
                    'labels.in' => '只可添加电脑租售二级标签'
                ];
            }
            default: {
                return [];
            }
        }
    }

    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'name' => [
                        'required',
                        'max:32',
                        Rule::notIn(
                            Computer::all()->pluck('name')->toArray()
                        )
                    ],
                    'img' => 'required|max:64',
                    'price' => 'required',
                    'price_unit' => 'required',
                    'details_url' => 'required|max:128',
                    'sales_volume' => 'nullable|integer',
                    'labels' => [
                        'required',
                        'array',
                        Rule::in(
                            Label::getLabelByCategoryName('电脑租售')
                                ->where('stage', '=', 2)
                                ->pluck('id')
                                ->toArray()
                        )
                    ],
                ];
            default;
                return [

                ];
        }
    }
}
