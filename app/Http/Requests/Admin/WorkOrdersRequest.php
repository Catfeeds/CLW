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
                    'manage_guid' => 'required|exists:sass.users,guid',
                    'guid' => 'required|exists:work_orders,guid'
                ];
            case'reset':
                return [
                    'manage_guid' => 'required|exists:sass.users,guid',
                    'guid' => 'required|exists:work_orders,guid'
                ];
            case 'allocation':
                return [
                    'handle_guid' => 'required|exists:sass.user,id',
                    'guid' => 'required|exists:work_orders,guid'
                ];
            case 'confirm':
                return [
                    'guid' => 'required|exists:work_orders,guid',
                ];

            case 'valid':
                return [
                    'guid' => 'required|exists:work_orders,guid',
                    'identifier' => 'required'
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
