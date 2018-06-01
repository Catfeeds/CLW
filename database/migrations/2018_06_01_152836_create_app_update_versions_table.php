<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppUpdateVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_update_versions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appId', 32)->nullable()->comment('appId');
            $table->string('version', 32)->nullable()->comment('版本号');
            $table->string('note', 255)->nullable()->comment('版本升级记录');
            $table->tinyInteger('type')->nullable()->comment('app类型：1：ios 2：android');
            $table->string('url', 255)->nullable()->comment('app下载链接');
            $table->tinyInteger('status')->nullable()->comment('状态：1：正常 2：删除');
            $table->integer('stage')->nullable()->comment('版本级别编号');
            $table->timestamps();
        });
        DB::statement("alter table `app_update_versions` comment'App版本表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_update_versions');
    }
}
