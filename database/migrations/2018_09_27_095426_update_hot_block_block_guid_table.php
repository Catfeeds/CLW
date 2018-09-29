<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHotBlockBlockGuidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hot_blocks', function (Blueprint $table) {
            $table->string('block_guid',32)->nullable()->comment('商圈guid')->after('block_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hot_blocks', function (Blueprint $table) {
            $table->dropColumn('block_guid');
        });
    }
}
