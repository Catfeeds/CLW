<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('category_id')->nullable()->comment('类id');
            $table->tinyInteger('parent_id')->nullable()->comment('父级id');
            $table->string('name','32')->nullable()->comment('标签名');
            $table->tinyInteger('stage')->nullable()->comment('等级');
            $table->string('img')->nullable()->comment('标签图片');
            $table->timestamps();
        });
        DB::statement("alter table `labels` comment'商城标签表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labels');
    }
}
