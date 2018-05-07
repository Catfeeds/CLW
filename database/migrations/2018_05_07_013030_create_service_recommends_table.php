<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRecommendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_recommends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->nullable()->comment('服务id');
            $table->string('pic', '128')->nullable()->comment('图片');
            $table->tinyinteger('weight')->nullable()->comment('权重');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `service_recommends` comment'推荐服务表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_recommends');
    }
}
