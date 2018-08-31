<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_categorie')->unsigned();
            $table->integer('id_marque')->unsigned();
            $table->integer('id_depot')->unsigned();
            $table->string('ref');
            $table->string('nom');
            $table->string('lot');
            $table->decimal('prix_achat',9,2);
            $table->decimal('prix_gros',9,2);
            $table->decimal('prix_demigros',9,2);
            $table->decimal('prix_client',9,2);
            $table->integer('quantite');
            $table->integer('quantite_min');
            $table->string('unite');
            $table->timestamps();
            $table->softDeletes();




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
