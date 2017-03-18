<?php

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
            $table->string('picture', 100)->nullable();
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('email', 50);
            $table->string('password', 150);
            $table->string('job', 200);
            $table->string('ip', 50);
            $table->string('token', 150);
            $table->timestamp('last_access');
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
        Schema::drop('admin_users');
    }
}
