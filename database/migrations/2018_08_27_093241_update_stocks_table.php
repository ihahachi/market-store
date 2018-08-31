<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('stocks', function (Blueprint $table) {
            $table->foreign('article_id')
            ->references('id')->on('articles')
            ->onDelete('cascade');

            $table->foreign('depot_id')
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
        $table->dropForeign(['article_id']);
        $table->dropColumn('article_id');

         $table->dropForeign(['depot_id']);
        $table->dropColumn('depot_id');
    }
}
