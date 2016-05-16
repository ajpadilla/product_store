<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('username', 50);
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->text('address');
            $table->string('post_code', 5);
            $table->integer('city_id')->index();
            $table->string('phone', 15);
            $table->boolean('active');
            $table->string('role', 64);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
