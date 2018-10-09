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
            $table->string('gd_identifier','64')->nullable()->comment('工单编号');
            $table->string('identifier')->nullable()->comment('客源/房源编号');
            $table->string('name','32')->nullable()->comment('客户名称');
            $table->string('tel', '16')->nullable()->comment('客户手机号');
            $table->tinyInteger('source')->nullable()->comment('来源,1:400电话,2:官网客服,3:百度信息流,4:今日头条信息流,5:app,6:PC,7:微信,8:小程序,9:58同城,10:360,11:搜狗,12:神马');
            $table->string('page_source',32)->nullable()->comment('来源区域');
            $table->tinyInteger('demand')->nullable()->comment('工单类型,1:投放房源,2:委托找房,3:企业服务,4:其他');
            $table->string('area_name',128)->nullable()->comment('区域');
            $table->string('building_name',128)->nullable()->comment('楼盘');
            $table->string('acreage', 32)->nullable()->comment('面积/㎡');
            $table->string('price', 32)->nullable()->comment('价格/元/m²月');
            $table->datetime('issue')->nullable()->comment('客服下发工单时间');
            $table->char('manage_guid', 32)->nullable()->comment('管理层guid');
            $table->datetime('manage_deal')->nullable()->comment('管理层分配工单时间');
            $table->char('handle_guid', 32)->nullable()->comment('处理人guid');
            $table->datetime('handle_deal')->nullable()->comment('处理人确定时间');
            $table->tinyInteger('status')->nullable()->default(1)->comment('工单状态:1:带处理,2:处理中,3:有效,4:无效 ');
            $table->string('reason', '64')->nullable()->comment('无效原因');
            $table->text('remark')->nullable()->comment('需求详情');
            $table->string('recorder', 32)->nullable()->comment('客服');
            $table->softDeletes();
            $table->timestamps();
        });
        \DB::statement("alter table `work_orders` comment'工单表'");
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
