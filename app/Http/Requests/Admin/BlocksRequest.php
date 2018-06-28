<?php

namespace App\Http\Requests\Admin;

use App\Models\Area;
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
            case 'store':
                return [
                    'name' => 'required|max:32',
                    'area_id' => [
                        'required',
                        'integer',
                        Rule::in(
                            Area::all()->pluck('id')->toArray()
                        )
                    ],
                    'recommend' => 'required|integer',
                    'agent_name' => 'max:32',
                    'agent_pic' => 'max:32',
                ];
            case 'update':
                return [
                    'name' => 'required|max:32',
                    'area_id' => [
                        'required',
                        'integer',
                        Rule::in(
                            Area::all()->pluck('id')->toArray()
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
