<?php

namespace App\Http\Requests\App;

use App\Models\EntrustThrowIn;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EntrustThrowInsRequest extends FormRequest
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
                    'tel.not_in' => '不能重复委托'
                ];
            case 'PUT':
            case 'PATCH':
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                }
        }
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
                    'tel' => [
                        'required',
                        'max:16',
                        'regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',
                        Rule::notIn(
                                EntrustThrowIn::whereBetween('created_at',[date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d'), date('Y'))),date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d'), date('Y')))])->where('type',$this->type)->pluck('tel')->toArray()
                            )
                        ],
                    'user_id' => 'nullable',
                    'appellation' => 'nullable|max:32',
                    'area_id' => 'nullable|exists:media.areas,id',
                    'area_name' => 'nullable',
                    'block_id' => 'nullable|exists:media.blocks,id',
                    'acreage' => 'nullable',
                    'building_name' => 'nullable|max:32',
                    'demand' => 'nullable',
                    'source' => 'nullable',
                    'page_source' => 'required',
                    'type' => 'required',
                ];
            case 'survey':
                return [
                    'id' => 'required|exists:entrust_throw_ins,id',
                    'status' => 'required|max:512'
                ];
            case 'addGd':
                return [
                    'id' => 'required|exists:entrust_throw_ins,id',
                    'name' => 'required|max:32',
                    'tel' =>  'required|max:16',
                    'source' => 'required|between:1,7|integer',
                    'demand' => 'required|between:1,2|integer',
                    'position' => 'nullable',
                    'acreage' => 'nullable',
                    'price' => 'nullable',
                    'shopkeeper_id' => 'required|exists:media.users,id',
                    'remark' => 'nullable',
                    'recorder' => 'required'
                ];
            default;
                return [

                ];
        }
    }
}
