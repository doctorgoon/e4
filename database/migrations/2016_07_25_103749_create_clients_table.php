<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function(Blueprint $table){
            $table->increments('id');
            $table->string('num')->nullable();
            $table->string('company', 255)->nullable();
            $table->string('lastname', 50);
            $table->string('firstname', 50);
            $table->string('address', 255)->nullable();
            $table->string('zipcode', 10)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('email', 50);
            $table->string('type')->nullable();

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
        Schema::drop('clients');
    }
}
