<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id');
            // 核心信息
            $table->string('house_identifier', 32)->nullable()->comment('房源编号: 住宅房源以大写X开头+年月日+3个数字');
            $table->string('gd_identifier','32')->nullable()->comment('工单编号');
            $table->integer('building_block_id')->nullable()->comment('楼座id');
            $table->char('building_block_guid', 32)->nullable()->comment('楼座guid');
            $table->char('building_guid', 32)->nullable()->comment('楼盘guid');
            $table->string('house_number', 32)->nullable()->comment('房号');
            $table->text('title')->nullable()->comment('房源标题');
            $table->json('owner_info')->nullable()->comment('业主联系方式:json');
            // 房子信息
            $table->tinyInteger('room')->nullable()->comment('N室');
            $table->tinyInteger('hall')->nullable()->comment('N厅');
            $table->string('constru_acreage', 32)->nullable()->comment('建筑面积');
            $table->tinyInteger('split')->nullable()->comment('可拆分 1: 是 2: 否');
            $table->string('min_acreage', 32)->nullable()->comment('最小面积');
            $table->integer('floor')->nullable()->comment('楼层');
            $table->string('station_number',32)->nullable()->comment('工位数量');
            $table->tinyInteger('office_building_type')->nullable()->comment('写字楼类型 1: 纯写字楼 2: 商住楼 3: 商业综合体楼 4: 酒店写字楼 5: 其他');
            $table->tinyInteger('register_company')->nullable()->comment('注册公司 1: 可以 2: 不可以');
            $table->tinyInteger('open_bill')->nullable()->comment('可开发票 1: 可以 2: 不可以');
            $table->tinyInteger('renovation')->nullable()->comment('装修: 1: 豪华装修 2: 精装修 3: 中装修 4: 间装修 5: 毛坯');
            $table->tinyInteger('orientation')->nullable()->comment('朝向: 1: 东 2: 西 3: 南 4: 北 5: 东南 6: 东北 7: 西南 8: 西北 9: 东西 10: 南北');
            $table->json('support_facilities')->nullable()->comment('配套设施');
            $table->string('house_description', 255)->nullable()->comment('房源描述');
            // 租赁信息
            $table->decimal('rent_price', 10, 2)->nullable()->comment('租金');
            $table->tinyInteger('rent_price_unit')->nullable()->comment('租金单位: 1: % 2: 多少元');
            $table->decimal('unit_price', 10, 2)->nullable()->comment('租金单价');
            $table->decimal('total_price', 10, 2)->nullable()->comment('租金总价');
            $table->tinyInteger('payment_type')->nullable()->comment('支付方式: 1: 押一付一 2: 押一付二 3: 押一付三 4: 押二付一 5: 押二付二 6: 押二付三 7: 押三付一 8: 押三付二 9: 押三付三 10: 半年付 11: 年付 12: 面谈');
            $table->date('check_in_time')->nullable()->comment('入住时间');
            $table->tinyInteger('shortest_lease')->nullable()->comment('最短租期: 1: 1-2年 2: 2-3年 3: 3-4年 4: 5年以上');
            $table->tinyInteger('rent_free')->nullable()->comment('免租期: 1: 1个月 2: 2个月 3: 3个月 4: 4个月 5: 5个月 6: 6个月 7: 7个月 8: 8个月 9: 9个月 10: 10个月 11: 面谈');
            $table->string('increasing_situation', 32)->nullable()->comment('递增情况');
            $table->string('increasing_situation_remark', 256)->nullable()->comment('递增情况备注');
            $table->json('cost_detail')->nullable()->comment('费用明细:json');
            // 业务信息
            $table->tinyInteger('house_busine_state')->nullable()->comment('房源业务状态: 1: 有效 2: 信息不明确 3: 暂缓 4: 已租 5: 出售 6: 无效 7: 签约');
            $table->decimal('pay_commission', 10, 2)->nullable()->comment('付佣');
            $table->tinyInteger('pay_commission_unit')->nullable()->comment('付佣单位: 1: % 2: 多少元');
            $table->tinyInteger('prospecting')->nullable()->comment('是否实勘 1: 是 2: 否');
            $table->tinyInteger('source')->nullable()->comment('来源: 1: 朋友 2: 客户 3: 同行 4: 赶集 5: 安居客 6: 58 7: 扫楼 8: 来访 9: 百度信息流 10: 今日头条信息流 11: 400电话 12: 官网客服 13: app 14: pc 15: 微信');
            $table->string('house_key',32)->nullable()->comment('钥匙');
            $table->tinyInteger('see_house_time')->nullable()->nullable()->comment('看房时间 1: 随时 2: 非工作时间 3: 电话预约');
            $table->string('see_house_time_remark',32)->nullable()->comment('看房时间备注');
            $table->tinyInteger('certificate_type')->nullable()->comment('证件类型: 1: 房地产证 2: 购房合同 3: 购房发票 4: 抵押合同 5: 认购书 6: 预售合同 7: 回迁合同');
            $table->tinyInteger('house_proxy_type')->nullable()->comment('房源状态: 1: 独家 2: 委托');
            $table->tinyInteger('guardian')->nullable()->comment('维护人');
            // 房源照片
            $table->json('house_type_img')->nullable()->comment('户型图:json');
            $table->json('indoor_img')->nullable()->comment('室内图:json');
            $table->tinyInteger('shelf')->nullable()->comment('是否上架 1: 是 2: 否');
            $table->integer('start_track_time')->nullable()->comment('跟进时间');
            $table->integer('end_track_time')->nullable()->comment('跟进结束时间');
            $table->integer('rent_time')->nullable()->comment('可租时间');
            $table->string('remarks')->nullable()->comment('信息不明确备注');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
