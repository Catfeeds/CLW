<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_notices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',32)->nullable()->comment('系统公告标题');
            $table->text('content')->nullable()->comment('系统公告内容');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `system_notices` comment'系统公告'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_notices');
    }
}
