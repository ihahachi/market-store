<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDechargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decharges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('bon_entre_id')->unsigned();
            $table->decimal('montant',9,2);
            $table->timestamps();

            $table->foreign('bon_entre_id')
            ->references('id')->on('bon_entres')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('decharges');
        $table->dropForeign(['bon_entre_id']);
        $table->dropColumn('bon_entre_id');
    }
}
