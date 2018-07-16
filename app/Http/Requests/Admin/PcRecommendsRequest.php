<?php

namespace App\Http\Requests\Admin;

use App\Models\PcRecommend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PcRecommendsRequest extends FormRequest
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
            case 'store':
                return [
                    'title.not_in' => '精品推荐标题不能重复',
                    'introduce.not_in' => '精品推荐介绍不能重复',
                ];
            case 'update':
                return [
                    'title.unique' => '精品推荐标题不能重复',
                    'introduce.unique' => '精品推荐介绍不能重复',
                ];
            default:
                {
                    return [];
                }
        }
    }

    // 字段验证
    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'title' => [
                        'required',
                        'max:32',
                        Rule::notIn(
                            PcRecommend::all()->pluck('title')->toArray()
                        )
                    ],
                    'introduce' => [
                        'required',
                        'max:512',
                        Rule::notIn(
                            PcRecommend::all()->pluck('introduce')->toArray()
                        )
                    ],
                    'pic' => 'required',
                    'big_details_pic' => 'required',
                    'small_details_pic' => 'required',
                    'building_id' => 'required|array',
                ];
            case 'update':
                return [
                    'title' => 'required|max:32|unique:pc_recommends,title,'.$this->route('pc_recommend')->id,
                    'introduce' => 'required|max:512|unique:pc_recommends,introduce,'.$this->route('pc_recommend')->id,
                    'pic' => 'required',
                    'big_details_pic' => 'required',
                    'small_details_pic' => 'required',
                    'building_id' => 'required|array',
                ];
            default:
                {
                    return [];
                }
        }
    }
}