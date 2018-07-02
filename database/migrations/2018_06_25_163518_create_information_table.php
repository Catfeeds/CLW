<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banner')->nullable()->comment('资讯缩略图');
            $table->string('source', 100)->nullable()->comment('来源');
            $table->string('title', 100)->nullable()->comment('标题');
            $table->string('brief')->nullable()->comment('摘要');
            $table->longText('content')->nullable()->comment('资讯内容');
            $table->string('click_num',32)->nullable()->comment('点击量');
            $table->tinyInteger('top')->default(2)->comment('1: 置顶 2: 不置顶');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `information` comment'资讯表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
}
