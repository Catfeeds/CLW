<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_type', 32)->nullable()->comment('model');
            $table->tinyInteger('rel_id')->nullable()->comment('关联id');
            $table->timestamps();
        });
        DB::statement("alter table `message_records` comment'消息记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_records');
    }
}
