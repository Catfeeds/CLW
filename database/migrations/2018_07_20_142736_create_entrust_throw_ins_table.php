<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrustThrowInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrust_throw_ins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gd_id')->nullable()->comment('工单id');
            $table->string('name', 32)->nullable()->comment('称谓');
            $table->string('tel', 16)->nullable()->comment('手机号');
            $table->integer('user_id')->nullable()->comment('用户id');
            $table->integer('area_id')->nullable()->comment('区域id');
            $table->string('area_name', 32)->nullable()->comment('区域名称');
            $table->integer('block_id')->nullable()->comment('商圈');
            $table->decimal('acreage')->nullable()->comment('面积');
            $table->string('building_name', '32')->nullable()->comment('楼盘名称');
            $table->tinyInteger('source')->nullable()->comment('来源,1:400电话,2:官网客服,3:百度信息流,4:今日头条信息流,5:app,6:PC,7:微信,8:小程序,9:58同城,10:商城');
            $table->string('page_source',32)->nullable()->comment('页面来源');
            $table->tinyInteger('demand')->nullable()->comment('需求类型,1:投放房源,2:委托找房,3:企业服务,4:其他');
            $table->text('remark')->nullable()->comment('需求');
            $table->string('status','512')->nullable()->comment('状态');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("alter table `entrust_throw_ins` comment'委托、投放表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrust_throw_ins');
    }
}
