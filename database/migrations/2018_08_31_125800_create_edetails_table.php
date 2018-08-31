<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdetailsTable extends Migration
{

    public function up()
    {
        Schema::create('edetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_article')->unsigned();
            $table->integer('bon_entre_id')->unsigned();
            $table->integer('quantite');
            $table->decimal('prix_vent',9,2);
            $table->string('type');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_article')
            ->references('id')->on('articles')
            ->onDelete('cascade');

            $table->foreign('bon_entre_id')
            ->references('id')->on('bon_entres')
            ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('edetails');

        $table->dropForeign(['id_article']);
        $table->dropColumn('id_article');

        $table->dropForeign(['bon_entre_id']);
        $table->dropColumn('bon_entre_id');
    }
}
