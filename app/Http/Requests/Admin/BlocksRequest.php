<?php

namespace App\Http\Requests\Admin;

use App\Models\Block;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlocksRequest extends FormRequest
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
     * 说明: 验证规则
     *
     * @return array
     * @author 罗振
     */
    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'update':
                return [
                    'guid' => [
                        'required',
                        'max:32',
                        Rule::in(
                            Block::all()->pluck('guid')->toArray()
                        )
                    ],
                    'recommend' => 'required|integer',
                    'agent_name' => 'max:32',
                    'agent_pic' => 'max:32',
                ];
            case 'addRecommend':
                return [
                    'recommend' => [
                        'required',
                        'integer',
                    ]
                ];
            default;
                return [

                ];
        }
    }

}
