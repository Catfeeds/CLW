<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEntrustThrowInsAreaGuidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entrust_throw_ins', function (Blueprint $table) {
            $table->string('area_guid',32)->nullable()->comment('区域guid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entrust_throw_ins', function (Blueprint $table) {
            $table->dropColumn('area_guid');
        });
    }
}
