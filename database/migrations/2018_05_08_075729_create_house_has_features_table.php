<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseHasFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_has_features', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('house_id')->nullable()->comment('房源id');
            $table->integer('house_feature_id')->nullable()->comment('房源id');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `building_has_features` comment'房源关联房源特色表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_has_features');
    }
}
