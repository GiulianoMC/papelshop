<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipBetweenMaterialsAndMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materiais', function (Blueprint $table) {

            $table->unsignedBigInteger('marca_id');

            // Define a chave estrangeira
            $table->foreign('marca_id', 'marca_fk')
                  ->references('id')
                  ->on('marcas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materiais', function (Blueprint $table) {

            $table->dropForeign('marca_fk'); 
            $table->dropColumn('marca_id');
        });
    }
}
