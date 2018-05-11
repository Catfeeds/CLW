<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',32)->nullable()->comment('登录账号');
            $table->string('password')->nullable()->comment('登录密码');
            $table->string('nick_name',32)->nullable()->comment('昵称');
            $table->timestamps();
        });
        DB::statement("alter table `admins` comment'后台登录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
