<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersIpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_login_ip',32)->nullable()->comment('最后登录ip')->after('last_login_time');
            $table->string('register_source',32)->nullable()->comment('注册来源')->after('last_login_ip');
            $table->string('last_login_city',32)->nullable()->comment('最后登录城市')->after('register_source');
            $table->string('last_login_source',32)->nullable()->comment('最后登录终端')->after('last_login_city');
            $table->integer('login_count')->nullable()->comment('登录次数')->after('last_login_source');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_login_ip');
            $table->dropColumn('register_source');
            $table->dropColumn('last_login_city');
            $table->dropColumn('last_login_source');
            $table->dropColumn('login_count');
        });
    }
}
