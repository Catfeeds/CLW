<?php

namespace App\Http\Requests\Admin;

use App\Models\Block;
use App\Models\HotBlock;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HotBlocksRequest extends FormRequest
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
                    'block_guid.in' => '商圈必须存在',
                    'block_guid.not_in' => '热门商圈不能重复',
                    'sort.not_in' => '排序不能重复'
                ];
            case 'update':
                return [
                    'block_guid.in' => '商圈必须存在'
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
     * @author 罗振
     */
    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'img' => 'required',
                    'block_guid' => [
                        'required',
                        'max:32',
                        Rule::in(
                            Block::all()->pluck('guid')->toArray()
                        ),
                        Rule::notIn(
                            HotBlock::all()->pluck('block_guid')->toArray()
                        )
                    ],
                    'sort' => [
                        'required',
                        'integer',
                        'between:1,5',
                        Rule::notIn(
                            HotBlock::all()->pluck('sort')->toArray()
                        )
                    ]
                ];
            case 'update':
                return [
                    'block_guid' => [
                        'required',
                        'max:32',
                        Rule::in(
                            Block::all()->pluck('guid')->toArray()
                        ),
                    ],
                    'sort' => [
                        'required',
                        'integer',
                        'between:1,5'
                    ]
                ];
            default:
                {
                    return [];
                }
        }
    }
}
