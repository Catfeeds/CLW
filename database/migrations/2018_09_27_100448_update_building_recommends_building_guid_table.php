<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBuildingRecommendsBuildingGuidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('building_recommends', function (Blueprint $table) {
            $table->string('building_guid',32)->nullable()->comment('楼盘guid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('building_recommends', function (Blueprint $table) {
            $table->dropColumn('building_guid');
        });
    }
}
