<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBiographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_biographies', function (Blueprint $table) {
           $table->increments('id');
           $table->unsignedInteger('user_id');
           $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
           $table->text('biography');
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
        Schema::dropIfExists('user_biographies');
    }
}
