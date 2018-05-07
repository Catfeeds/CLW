<?php

namespace App\Http\Requests\Admin;

use App\Models\Building;
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
                    'building_id.in' => '楼盘必须存在'
                ];
            case 'PUT':
            case 'PATCH':
            return [
                'building_id.in' => '楼盘必须存在'
            ];
            case 'GET':
            case 'DELETE':
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
                    'pic' => 'required|max:128',
                    'building_id' => [
                        'required',
                        'array',
                        Rule::in(
                            Building::whereIn('id', $this->building_id)->pluck('id')->toArray()
                        )
                    ],
                ];
            case 'PUT':
            case 'PATCH':
            return [
                'title' => [
                    'required',
                    'max:32',
                ],
                'introduce' => [
                    'required',
                    'max:32',
                ],
                'pic' => 'required|max:128',
                'building_id' => [
                    'required',
                    'array',
                    Rule::in(
                        Building::whereIn('id', $this->building_id)->pluck('id')->toArray()
                    )
                ],
            ];
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                }
        }
    }
}