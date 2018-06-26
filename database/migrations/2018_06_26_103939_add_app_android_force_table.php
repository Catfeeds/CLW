<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAppAndroidForceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_update_versions', function (Blueprint $table) {
            $table->tinyInteger('force')->nullable()->comment('状态：1：强制跟新 2：不强制更新')->after('stage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_update_versions', function (Blueprint $table) {
            $table->dropColumn('force');
        });
    }
}
