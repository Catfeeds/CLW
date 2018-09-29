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
                    'demand' => 'nullable|integer',
                    'position' => 'nullable',
                    'acreage' => 'nullable',
                    'price' => 'nullable',
                    'shopkeeper_guid' => 'required|exists:saas.users,guid',
                    'remark' => 'nullable',
                    'recorder' => 'required'
                ];
            case 'update':
                return [
                    'name' => 'required|max:32',
                    'tel' =>  'required|max:16',
                    'source' => 'required|integer',
                    'demand' => 'nullable|integer',
                    'position' => 'nullable',
                    'acreage' => 'nullable',
                    'price' => 'nullable',
                    'shopkeeper_guid' => 'required|exists:saas.users,guid',
                    'remark' => 'nullable',
                ];
            case 'distribution':
                return [
                    'staff_guid' => 'required|exists:saas.users,guid'
                ];
            case 'feedback':
                return [
                    'feedback' => 'required',
                    'valid' => 'required'
                ];
            default:
                {
                    return [];
                }
        }
    }
}
