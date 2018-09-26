<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEntrustThrowIns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entrust_throw_ins', function (Blueprint $table) {
            $table->dropColumn('gd_id');
            $table->char('gd_guid', 32)->nullable()->comment('工单guid')->after('id');
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
            $table->integer('gd_id')->after('id');
            $table->dropColumn('gd_guid', 32);
        });
    }
}
