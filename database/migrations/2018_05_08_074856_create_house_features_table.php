<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','32')->nullable()->comment('名称');
            $table->tinyInteger('weight')->nullable()->comment('权重');
            $table->timestamps();
        });
        DB::statement("alter table `house_features` comment'房源特色表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_features');
    }
}
