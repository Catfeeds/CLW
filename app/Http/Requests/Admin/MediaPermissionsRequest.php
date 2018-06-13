<?php

namespace App\Http\Requests\Admin;

use App\Models\MediaPermission;
use App\Models\MediaPermissionGroup;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MediaPermissionsRequest extends FormRequest
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
                    'name.not_in' => '权限英文名称不能重复',
                    'group_id.in' => '权限组必须存在'
                ];
            case 'update':
                return [
                    'id.exists' => '权限id必须存在',
                    'name.unique' => '权限英文名称不能重复',
                    'group_id.exists' => '权限组必须存在'
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
                    'name' => [
                        'required',
                        'string',
                        'min:1',
                        'max:32',
                        'regex:/^[a-z\d\_]*$/i',
                        Rule::notIn(
                            MediaPermission::where('guard_name', 'web')
                                ->pluck('name')
                                ->toArray()
                        )
                    ],
                    'label' => 'required|string|min:1|max:32',
                    'group_id' => [
                        'required',
                        Rule::in(
                            MediaPermissionGroup::all()->pluck('id')->toArray()
                        )
                    ],
                ];
            case 'update':
                return [
                    'id' => 'required|exists:media.permissions,id',
                    'name' => 'required|string|min:1|max:32|regex:/^[a-z\d\_]*$/i|unique:media.permissions,name,'.$this->id,
                    'label' => 'required|string|min:1|max:32',
                    'group_id' => 'required|exists:media.permission_groups,id',
                ];
            default;
                return [

                ];
        }
    }

}
