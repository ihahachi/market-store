<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBonSoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bon_sorties', function (Blueprint $table) {
            $table->foreign('id_vendeur')
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
        Schema::table('bon_sorties', function (Blueprint $table) {
            $table->dropForeign(['id_vendeur']);
            $table->dropColumn('id_vendeur');
        });
    }
}
