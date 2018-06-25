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
            $table->string('source', 100)->comment('来源');
            $table->string('title', 100)->comment('标题');
            $table->string('brief')->comment('摘要');
            $table->longText('content')->comment('资讯内容');
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
