<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingRecommendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_recommends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_id')->nullable()->comment('楼盘id');
            $table->string('img',128)->comment('图片');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `building_recommends` comment'楼盘推荐表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_recommends');
    }
}
