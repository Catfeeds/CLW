<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecommendsPcPicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recommends', function (Blueprint $table) {
            $table->string('pc_pic','128')->nullable()->comment('pc端图片')->after('pic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recommends', function (Blueprint $table) {
            $table->dropColumn('pc_pic');
        });
    }
}
