<?php

namespace App\Http\Requests\Admin;

use App\Models\Building;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class BuildingRecommendsRequest extends FormRequest
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
     * 说明: 验证错误信息
     *
     * @return array
     * @author 罗振
     */
    public function messages()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'building_id.in' => '楼盘必须存在',
                ];
            case 'update':
                return [
                    'building_id.in' => '商圈必须存在'
                ];
            default:
                {
                    return [];
                }
        }
    }

    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'building_id' => [
                        'required',
                        'integer',
                        Rule::in(
                            Building::all()->pluck('id')->toArray()
                        )
                    ],
                    'img' => 'required|string|max:128',
                    'name' => 'required|max:32'
                ];
            case 'update':
                return [
                    'building_id' => [
                        'required',
                        'integer',
                        Rule::in(
                            Building::all()->pluck('id')->toArray()
                        )
                    ],
                    'img' => 'required|string|max:128',
                    'name' => 'required|max:32'
                ];
            default;
                return [

                ];
        }
    }

}

