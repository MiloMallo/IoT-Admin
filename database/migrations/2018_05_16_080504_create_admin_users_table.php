<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();//邮箱
            $table->string('abbreviation');//简称
            $table->string('username', 25);
            $table->string('password', 60);
            $table->string('phone',60);
            $table->string('avatar');
            $table->string('address',120)->nullable();
            $table->enum('sex',array('男','女'))->nullable();//性别
            $table->string('QQ',20)->nullable();//QQ
            $table->string('mobile',60)->nullable();//座机
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
