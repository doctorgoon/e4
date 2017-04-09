<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersNotesTable extends Migration
{
    /* Lancer la migration.
     * @return void*/
    public function up()
    {
        Schema::create('users_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->longText('task')->nullable(true);
            $table->smallInteger('progress')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('admin_users')->onDelete('cascade');
        });
    }

    /* Renverser la migration.
     * @return void */
    public function down()
    {
        Schema::drop('users_notes');
    }
}
