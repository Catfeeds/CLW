<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultTelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consult_tels', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('user_id')->nullable()->comment('用户id');
            $table->string('source',32)->nullable()->comment('来源');
            $table->string('page_source',32)->nullable()->comment('页面来源');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `consult_tels` comment'咨询电话统计'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consult_tels');
    }
}
