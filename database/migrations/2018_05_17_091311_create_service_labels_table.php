<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',32)->nullable()->comment('标签名称');
            $table->tinyInteger('service_id')->nullable()->comment('服务id');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `service_labels` comment'服务标签表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_labels');
    }
}
