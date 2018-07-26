<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',32)->nullable()->comment('绿植商品名称');
            $table->string('img',64)->nullable()->comment('绿植商品图片');
            $table->decimal('price',10,2)->nullable()->comment('绿植商品价格');
            $table->string('price_unit',32)->nullable()->comment('绿植商品价格单位');
            $table->string('details_url',128)->nullable()->comment('绿植商品详情url');
            $table->integer('sales_volume')->nullable()->comment('绿植商品销量');
            $table->timestamps();
            $table->softDeletes();
        });
        \DB::statement("alter table `plants` comment'商城绿植商品表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plants');
    }
}
