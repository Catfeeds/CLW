<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePcRecommendsBuildingGuidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pc_recommends', function (Blueprint $table) {
            $table->json('building_guid')->nullable()->comment('楼盘guid')->after('building_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pc_recommends', function (Blueprint $table) {
            $table->dropColumn('building_guid');
        });
    }
}
