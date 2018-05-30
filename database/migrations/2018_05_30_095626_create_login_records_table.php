<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->comment('用户id');
            $table->string('login_ip',32)->nullable()->comment('登录ip');
            $table->string('login_city',32)->nullable()->comment('登录城市');
            $table->string('login_source',32)->nullable()->comment('登录终端');
            $table->timestamps();
        });
        DB::statement("alter table `login_records` comment'登录记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_records');
    }
}
