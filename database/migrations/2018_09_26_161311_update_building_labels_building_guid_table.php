<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBuildingLabelsBuildingGuidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('building_labels', function (Blueprint $table) {
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
        Schema::table('building_labels', function (Blueprint $table) {
            $table->dropColumn('building_guid');
        });
    }
}
