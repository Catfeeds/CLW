<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteRecommendsPcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recommends', function($table)
        {
            $table->dropColumn('pc_pic', 'pc_big_details_pic', 'pc_small_details_pic', 'details_introduce');
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
            $table->string('pc_pic','128')->nullable()->comment('pc端图片')->after('pic');
            $table->string('pc_big_details_pic','128')->nullable()->comment('pc端大详情图片')->after('pc_pic');
            $table->string('pc_small_details_pic','128')->nullable()->comment('pc端小详情图片')->after('pc_big_details_pic');
            $table->string('details_introduce','256')->nullable()->comment('介绍')->after('pc_small_details_pic');
        });
    }
}
