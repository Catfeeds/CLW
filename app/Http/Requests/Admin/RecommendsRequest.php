<?php

namespace App\Http\Requests\Admin;

use App\Models\Recommend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RecommendsRequest extends FormRequest
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
                    'title.not_in' => '精品推荐标题不能重复',
                    'introduce.not_in' => '精品推荐介绍不能重复',
                ];
            default:
                {
                    return [];
                }
        }
    }

    /**
     * 说明: 字段验证
     *
     * @return array
     * @author 刘坤涛
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'title' => [
                        'required',
                        'max:32',
                        Rule::notIn(
                            Recommend::all()->pluck('title')->toArray()
                        )
                    ],
                    'introduce' => [
                        'required',
                        'max:32',
                        Rule::notIn(
                            Recommend::all()->pluck('introduce')->toArray()
                        )
                    ],
                    'pic' => 'required',
                    'building_id' => 'required|array',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'title' => 'required|max:32',
                    'introduce' => 'required|max:32',
                    'pic' => 'required',
                    'building_id' => 'required|array',
                ];
            default:
                {
                    return [];
                }
        }
    }
}