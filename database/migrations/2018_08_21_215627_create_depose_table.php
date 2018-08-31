<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeposeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_');
            $table->integer('id_client')->unsigned();
            $table->decimal('depose',9,2);
            $table->decimal('recette',9,2);
            $table->timestamps();
            $table->softDeletes();

            //$table->foreign('id_client')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposes');
    }
}
