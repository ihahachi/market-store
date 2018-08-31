<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDetailBssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_bs', function (Blueprint $table) {
            $table->foreign('id_bon_sortie')
            ->references('id')->on('bon_sorties')
            ->onDelete('cascade');

            $table->foreign('id_article')
            ->references('id')->on('articles')
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
        Schema::table('detail_bs', function (Blueprint $table) {
            $table->dropForeign(['id_bon_sortie']);
            $table->dropColumn('id_bon_sortie');

            $table->dropForeign(['id_article']);
            $table->dropColumn('id_article');
        });
    }
}
