<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcEnterpriseServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_enterprise_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('master_title')->nullable()->comment('pc端企业服务主标题');
            $table->string('vice_title')->nullable()->comment('pc端企业服务主副标题');
            $table->string('img')->nullable()->comment('pc端企业服务图片');
            $table->string('url')->nullable()->comment('pc端企业服务url');
            $table->timestamps();
        });
        DB::statement("alter table `pc_enterprise_services` comment'pc端企业服务'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pc_enterprise_services');
    }
}
