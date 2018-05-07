<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBespeaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bespeaks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tel', 16)->nullable()->comment('手机号');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `bespeaks` comment'预约表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bespeaks');
    }
}
