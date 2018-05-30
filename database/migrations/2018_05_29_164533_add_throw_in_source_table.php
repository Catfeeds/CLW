<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThrowInSourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('throw_ins', function (Blueprint $table) {
            $table->string('area_name', 32)->nullable()->comment('区域名')->after('area_id');
            $table->string('source',32)->nullable()->comment('来源')->after('building_name');
            $table->string('page_source',32)->nullable()->comment('页面来源')->after('source');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('throw_ins', function (Blueprint $table) {
            $table->dropColumn('area_name');
            $table->dropColumn('source');
            $table->dropColumn('page_source');
        });
    }
}
