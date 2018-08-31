<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonEntresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_entres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref');
            $table->date('date_');
            $table->integer('vendeur_id')->unsigned();

            $table->decimal('montant_total',9,2);
            $table->decimal('montant_versement',9,2);
            $table->decimal('cradit_sortie',9,2);
            $table->decimal('cradit_entree',9,2);
            $table->decimal('ecart',9,2);

            $table->string('observation');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('vendeur_id')
            ->references('id')->on('vendeurs')
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
        Schema::dropIfExists('bon_entres');
        $table->dropForeign(['vendeur_id']);
        $table->dropColumn('vendeur_id');
    }
}
