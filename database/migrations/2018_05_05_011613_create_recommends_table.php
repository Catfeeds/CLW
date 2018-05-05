<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title','32')->nullable()->comment('标题');
            $table->string('introduce','32')->nullable()->comment('介绍');
            $table->string('pic','128')->nullable()->comment('图片');
            $table->json('building_id')->nullable()->comment('楼盘ID');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `recommends` comment'精品推荐表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recommends');
    }
}
