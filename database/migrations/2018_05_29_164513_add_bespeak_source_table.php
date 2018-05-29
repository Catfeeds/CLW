<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBespeakSourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bespeaks', function (Blueprint $table) {
            $table->string('source',32)->nullable()->comment('来源')->after('demand');
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
        Schema::table('bespeaks', function (Blueprint $table) {
            $table->dropColumn('last_login_ip');

        });
    }
}
