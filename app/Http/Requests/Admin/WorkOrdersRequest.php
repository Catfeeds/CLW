<?php

namespace App\Http\Requests\Admin;

use App\Models\WorkOrder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkOrdersRequest extends FormRequest
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
                    'name' => 'nullable|max:32',
                    'tel' => [
                        'required',
                        'max:16',
                        Rule::notIn(
                            WorkOrder::whereBetween('created_at',[date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d'), date('Y'))),date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d'), date('Y')))])->where('demand',$this->demand)->pluck('tel')->toArray()
                        )
                    ],
                    'source' => 'required|integer',
                    'page_source' => 'nullable',
                    'demand' => 'required|integer',
                    'area_name' => 'nullable',
                    'building_name' => 'nullable',
                    'acreage' => 'nullable',
                    'price' => 'nullable',
                    'remark' => 'nullable'
                ];
            case 'update':
                return [
                    'name' => 'nullable|max:32',
                    'tel' => [
                        'max:16',
                    ],
                    'source' => 'nullable',
                    'demand' => 'integer',
                    'area_name' => 'nullable',
                    'building_name' => 'nullable',
                    'acreage' => 'nullable',
                    'price' => 'nullable',
                    'remark' => 'nullable'
                ];
            case'issue':
                return [
                    'manage_guid' => 'required',
                    'guid' => 'required|exists:work_orders,guid'
                ];
            case'reset':
                return [
                    'manage_guid' => 'required',
                    'guid' => 'required|exists:work_orders,guid'
                ];
            case 'allocation':
                return [
                    'handle_guid' => 'required',
                    'guid' => 'required|exists:work_orders,guid'
                ];
            case 'confirm':
                return [
                    'guid' => 'required|exists:work_orders,guid',
                ];
            case 'valid':
                return [
                    'guid' => 'required|exists:work_orders,guid',
                    'identifier' => 'required',
                    'demand' => 'required'
                ];
            case 'invalid':
                return [
                    'guid' => 'required|exists:work_orders,guid',
                    'reason' => 'required'
                ];
            case 'track':
                return [
                    'guid' => 'required|exists:work_orders,guid',
                    'track' => 'required'
                ];
            case 'rotate':
                return [
                    'guid' => 'required|exists:work_orders,guid',
                    'reason' => 'required'
                ];
            default:
                {
                    return [];
                }
        }
    }
}
