<?php

use Illuminate\Database\Seeder;

use App\Models\Admin;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $temp = Admin::create([
            'name' => 'chulouwang',
            'password' => bcrypt('chulouwang'),
            'nick_name' => '超级管理员'
        ]);
        $temp->assignRole(11);
    }
}
