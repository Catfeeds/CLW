<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcceptMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accept_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type')->nullable()->comment('消息类型,1=>预约,2=>投放...');
            $table->integer('admin_id')->nullable()->comment('消息接收人员id');
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
        Schema::dropIfExists('accept_messages');
    }
}
