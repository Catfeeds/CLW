<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('block_guid',32)->nullable()->comment('商圈guid');
            $table->tinyInteger('recommend')->nullable()->comment('是否推荐 1: 是 2: 否');
            $table->string('agent_name',32)->nullable()->comment('经纪人名称');
            $table->string('agent_pic',32)->nullable()->comment('经纪人图片');
            $table->softDeletes();
            $table->timestamps();
        });
        DB::statement("alter table `rel_blocks` comment'推荐商圈关联表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_blocks');
    }
}
