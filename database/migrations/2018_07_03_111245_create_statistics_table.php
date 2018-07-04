<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('source_58_custom')->nullable()->comment('58客源');
            $table->integer('source_ajk_custom')->nullable()->comment('安居客客源');
            $table->integer('source_gj_custom')->nullable()->comment('赶集客源');
            $table->integer('source_58_house')->nullable()->comment('58房源');
            $table->integer('source_ajk_house')->nullable()->comment('安居客房源');
            $table->integer('source_gj_house')->nullable()->comment('赶集房源');
            $table->integer('count')->nullable()->comment('总计');
            $table->timestamps();
        });
        DB::statement("alter table `employees` comment'客源、房源统计表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
