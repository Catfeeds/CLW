<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
            case 'valid':
                if ($this->demand == 1) {
                    $str = '房源编号无效';
                }else {
                    $str = '客源编号无效';
                }
                return [
                    'identifier.exists' => $str
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
                    'name' => 'required|max:32',
                    'tel' =>  'required|max:16',
                    'source' => 'required|integer',
                    'source_area' => 'nullable',
                    'demand' => 'required|integer',
                    'area' => 'nullable',
                    'building' => 'nullable',
                    'acreage' => 'nullable',
                    'price' => 'nullable',
                    'remark' => 'nullable'
                ];
            case'issue':
                return [
                    'manage_guid' => 'required|exists:chulou-saas.users,guid',
                    'guid' => 'required|exists:work_orders,guid'
                ];
            case'reset':
                return [
                    'manage_guid' => 'required|exists:chulou-saas.users,guid',
                    'guid' => 'required|exists:work_orders,guid'
                ];
            case 'allocation':
                return [
                    'handle_guid' => 'required|exists:chulou-saas.users,guid',
                    'guid' => 'required|exists:work_orders,guid'
                ];
            case 'confirm':
                return [
                    'guid' => 'required|exists:work_orders,guid',
                ];

            case 'valid':
                if ($this->demand == 1) {
                    $table = 'houses';
                    $field = 'house_identifier';
                } else {
                    $table = 'customers';
                    $field = 'guid';
                }
                return [
                    'guid' => 'required|exists:work_orders,guid',
                    'identifier' => 'required|exists:chulou-saas.'.$table.','.$field

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
