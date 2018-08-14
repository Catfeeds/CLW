<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',32)->nullable()->comment('办公设备商品名称');
            $table->string('img',64)->nullable()->comment('办公设备商品图片');
            $table->decimal('price',10,2)->nullable()->comment('办公设备商品价格');
            $table->string('price_unit',32)->nullable()->comment('办公设备商品价格单位');
            $table->string('details_url',128)->nullable()->comment('办公设备商品详情url');
            $table->timestamps();
        });
        \DB::statement("alter table `computers` comment'办公设备'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computers');
    }
}
