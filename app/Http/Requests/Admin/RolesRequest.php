<?php

namespace App\Http\Requests\Admin;

use App\Models\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RolesRequest extends FormRequest
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
     * 说明: 提示
     *
     * @return array
     * @author 罗振
     */
    public function messages()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'permissions.*.in' => '请勿添加不存在的权限'
                ];
            case 'update':
                return [

                ];
            default;
                return [

                ];
        }
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
                    'name_cn' => 'required|max:255',
                    'name_en' => 'required|max:255|regex:/^[a-z\d\_]*$/i|unique:media.roles,name',
                    'permissions' => 'required|array',
                    'permissions.*' => [
                        'required',
                        Rule::in(Permission::all()->pluck('name')->toArray())
                    ]
                ];
            case 'update':
                return [

                ];
            default;
                return [

                ];
        }
    }

}
