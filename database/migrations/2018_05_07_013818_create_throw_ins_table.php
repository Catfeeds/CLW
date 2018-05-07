<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThrowInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('throw_ins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tel', 16)->nullable()->comment('手机号');
            $table->timestamps();
        });
        DB::statement("alter table `throw_ins` comment'投放表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('throw_ins');
    }
}
