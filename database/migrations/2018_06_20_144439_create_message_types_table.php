<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', '32')->nullable()->comment('消息名称');
            $table->timestamps();
        });
        DB::statement("alter table `employees` comment'消息类型表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_types');
    }
}
