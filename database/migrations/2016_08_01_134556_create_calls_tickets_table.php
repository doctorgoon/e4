<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCallsTicketsTable extends Migration
{
    /* Run the migrations.
     * @return voidv*/
    public function up()
    {
        Schema::create('calls_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('call_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('description');
            $table->integer('duration');
            $table->timestamps();
            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('admin_users')->onDelete('cascade');

        });
    }

    /* Reverse the migrations.
     * @return void */
    public function down()
    {
        Schema::drop('calls_tickets');
    }
}
