<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCustomerServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_service', function(Blueprint $table){
            $table->increments('id');
            $table->integer('client_id');
            $table->boolean('guarantee');
            $table->string('device');
            $table->longText('issue');
            $table->timestamp('recep_client')->nullable();  // client   ->  lamirau
            $table->timestamp('exp_it')->nullable();        // lamirau  ->  mir
            $table->timestamp('recep_it')->nullable();      // mir      ->  lamirau
            $table->timestamp('exp_client')->nullable();    // lamirau  ->  client

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
        Schema::drop('customer_service');
    }
}
