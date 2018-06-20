<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
                    'tel.unique' => '电话不能重复',
                    'tel.size' => '电话号码格式不正确',
                    'email.email' => '请填写正确的邮箱格式',
                ];
            case 'update':
                return [
                    'tel.unique' => '电话不能重复',
                    'tel.size' => '电话号码格式不正确',
                    'email.email' => '请填写正确的邮箱格式',
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
                    'name' => 'required|min:2,max:10',
                    'tel' => 'required|size:11|unique:employees,tel',
                    'email' => 'nullable|email'
                ];
            case 'update':
                return [
                    'name' => 'required|min:2,max:10',
                    'tel' => 'required|size:11|unique:employees,tel,'.$this->route('employee')->id,
                    'email' => 'nullable|email',
                ];
            default:
                {
                    return [];
                }
        }
    }

}
