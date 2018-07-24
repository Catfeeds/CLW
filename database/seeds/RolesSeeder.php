<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = Permission::where('guard_name','web');
        $role = Role::create([
            'name_cn' => '超级管理员',
            'name' => 'admin',
            'name_en' => 'admin',
            'guard_name' => 'web',
        ]);
        $role->givePermissionTo($model->pluck('name')->toArray());
    }
}
