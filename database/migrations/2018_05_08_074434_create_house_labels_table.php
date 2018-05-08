<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('house_id')->nullable()->comment('房源标签表');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table `house_labels` comment'房源标签表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_labels');
    }
}
