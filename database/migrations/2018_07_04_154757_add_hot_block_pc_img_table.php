<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHotBlockPcImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hot_blocks', function (Blueprint $table) {
            $table->string('pc_img', 32)->nullable()->comment('pc端热门商圈图片')->after('img');
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
            $table->dropColumn('pc_img');
        });
    }
}
