<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('house_id')->nullable()->comment('房源id');
            $table->tinyInteger('label')->nullabel()->comment('房源是否有标签,1=>有,2没有');
            $table->tinyInteger('status')->bullable()->comment('房源是否上架,1=>上架,2=>下架');
            $table->timestamps();
        });
        DB::statement("alter table `house_labels` comment'房源标签表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_labels');
    }
}
