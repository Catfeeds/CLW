<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('名称');
            $table->string('tel', 16)->nullable()->comment('手机号');
            $table->string('password')->nullable()->comment('密码');
            $table->string('img')->nullable()->comment('用户图像');
            $table->timestamp('last_login_time')->nullable()->comment('最后登录时间');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement("alter table `users` comment'用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
