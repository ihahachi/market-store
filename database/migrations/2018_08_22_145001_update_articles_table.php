<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('id_categorie')
            ->references('id')->on('categories')
            ->onDelete('cascade');

            $table->foreign('id_marque')
            ->references('id')->on('marques')
            ->onDelete('cascade');

            $table->foreign('id_depot')
            ->references('id')->on('depots')
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
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['id_categorie']);
            $table->dropColumn('id_categorie');

            $table->dropForeign(['id_marque']);
            $table->dropColumn('id_marque');

            $table->dropForeign(['id_depot']);
            $table->dropColumn('id_depots');
        });
    }
}
