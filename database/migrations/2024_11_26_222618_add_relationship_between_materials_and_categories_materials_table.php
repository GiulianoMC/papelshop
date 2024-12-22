<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipBetweenMaterialsAndCategoriesMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materiais', function (Blueprint $table) {
            // Cria o campo de chave estrangeira para a relação com a tabela 'categorias'
            $table->unsignedBigInteger('categoria_id');

            // Define a chave estrangeira
            $table->foreign('categoria_id', 'categoria_fk')
                  ->references('id')
                  ->on('categorias')
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
            // Remove a relação e a coluna
            $table->dropForeign('categoria_fk'); // Nome do índice criado
            $table->dropColumn('categoria_id');
        });
    }
}
