<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueryTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('query_times', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_name')->nullable()->comment('项目名称');
            $table->string('url', 256)->nullable()->comment('接口请求地址');
            $table->integer('time')->nullable()->comment('接口运行时间');
            $table->timestamps();
        });
        DB::statement("alter table `query_times` comment'慢查询记录表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('query_times');
    }
}
