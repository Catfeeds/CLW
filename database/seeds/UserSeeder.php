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
        $temp = Admin::where('name', 'admin@chulouwang.com')->first();
        $temp->assignRole(1);
    }
}
