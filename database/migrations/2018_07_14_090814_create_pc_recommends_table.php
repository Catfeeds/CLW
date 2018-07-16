<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcRecommendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_recommends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title','32')->nullable()->comment('标题');
            $table->string('introduce','512')->nullable()->comment('介绍');
            $table->string('pic','128')->nullable()->comment('pc端图片');
            $table->string('big_details_pic','128')->nullable()->comment('pc端大详情图片');
            $table->string('small_details_pic','128')->nullable()->comment('pc端小详情图片');
            $table->json('building_id')->nullable()->comment('楼盘ID');
            $table->json('building_info')->nullable()->comment('楼盘id与名称信息');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `pc_recommends` comment'pc端精品推荐表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pc_recommends');
    }
}
