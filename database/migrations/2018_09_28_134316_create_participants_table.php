<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->char('guid', 32)->primary()->comment('guid主键');
            $table->char('work_order_guid', 32)->nullable()->comment('工单guid');
            $table->char('user_guid', 32)->nullable()->comment('参与人guid');
            $table->softDeletes();
            $table->timestamps();
        });
        \DB::statement("alter table `participants` comment'工单参与人表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
