<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', '32')->nullable()->comment('员工姓名');
            $table->string('tel', '16')->nullable()->comment('电话');
            $table->string('email', '32')->nullable()->comment('邮箱');
            $table->string('openid', '128')->nullable()->comment('员工微信id');
            $table->timestamps();
        });
        DB::statement("alter table `employees` comment'员工表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
