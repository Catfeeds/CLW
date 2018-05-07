<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','32')->nullable()->comment('服务分类名称');
            $table->tinyInteger('weight')->nullable()->comment('权重');
            $table->tinyInteger('shelf')->nullable()->comment('是否上架,1=>上架,2=>不上架');
            $table->tinyInteger('show')->nullable()->comment('是否显示在首页导航栏,1=>显示,2=>不显示');
            $table->string('icon','128')->nullable()->comment('图标');
            $table->json('detail')->nullable()->comment('服务详情');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `services` comment'服务表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
