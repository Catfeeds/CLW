<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hot_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img', 32)->nullable()->comment('热门商圈图片');
            $table->tinyInteger('block_id')->nullable()->comment('商圈id');
            $table->tinyInteger('sort')->nullable()->comment('热门商圈排序');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `hot_blocks` comment'热门商圈'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hot_blocks');
    }
}
