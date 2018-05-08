<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_id')->nullable()->comment('楼盘ID');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `building_labels` comment'楼盘标签表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_labels');
    }
}
