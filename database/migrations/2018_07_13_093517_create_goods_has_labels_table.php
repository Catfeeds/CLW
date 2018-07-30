<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsHasLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_has_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_type')->comment('商品model');
            $table->char('goods_id',32)->comment('商品id');
            $table->integer('label_id')->unsigned()->comment('标签id');
            $table->timestamps();
        });
        DB::statement("alter table `goods_has_labels` comment'标签商品关联表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_has_labels');
    }
}
