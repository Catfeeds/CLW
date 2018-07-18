<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcServiceRecommendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_service_recommends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pic','128')->nullable()->comment('图片');
            $table->string('url','256')->nullable()->comment('推荐服务商品url');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `pc_service_recommends` comment'pc端推荐服务商铺管理'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pc_service_recommends');
    }
}
