<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingHasFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_has_features', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_id')->nullable()->comment('楼盘id');
            $table->integer('building_feature_id')->nullable()->comment('楼盘特色id');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `building_has_features` comment'楼盘关联楼盘特色表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_has_features');
    }
}
