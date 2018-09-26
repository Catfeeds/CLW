<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->char('guid', 32)->primary()->comment('guid主键');
            $table->string('identifier','64')->nullable()->comment('工单编号');
            $table->string('name','32')->nullable()->comment('客户名称');
            $table->string('tel', '16')->nullable()->comment('客户手机号');
            $table->tinyInteger('source')->nullable()->comment('客户来源,1:400电话,2:官网客服,3:百度信息流,4:今日头条信息流,5:app,6:PC,7:微信,8:小程序,9:58同城,10:360,11:搜狗,12:神马');
            $table->tinyInteger('demand')->nullable()->comment('需求类型,1:投放房源,2:委托找房,3:企业服务,4:其他');
            $table->string('position',32)->nullable()->comment('区域或楼盘');
            $table->string('acreage', 32)->nullable()->comment('面积');
            $table->string('price', 32)->nullable()->comment('价格');
            $table->char('shopkeeper_guid', 32)->nullable()->comment('分配店长guid');
            $table->datetime('shopkeeper_deal')->nullable()->comment('店长处理时间');
            $table->char('staff_guid', 32)->nullable()->comment('员工guid');
            $table->datetime('staff_deal')->nullable()->comment('员工确定时间');
            $table->text('feedback')->nullable()->comment('反馈');
            $table->tinyInteger('valid')->nullable()->comment('是否有效, 1:有效,2:无效');
            $table->tinyInteger('clinch')->nullable()->comment('是否成交, 1:成交，2:未成交');
            $table->text('remark')->nullable()->comment('备注');
            $table->string('recorder', 32)->nullable()->comment('录入人');
            $table->softDeletes();
            $table->timestamps();
        });
        \DB::statement("alter table `work_orders` comment'原始客源表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_orders');
    }
}
