<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Materiais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiais', function (Blueprint $table) {
            $table->bigIncrements('id'); // Chave primária
            $table->string('nome'); // Nome do material
            $table->decimal('preco', 8, 2); // Preço
            $table->text('descricao')->nullable(); // Descrição
            $table->date('data_compra')->nullable(); // Data de compra
            $table->boolean('disponivel')->default(true); // Disponibilidade
            $table->binary('imagem')->nullable(); // Coluna para armazenar a imagem em formato binário (BLOB)
            $table->timestamps(); // Data de criação e atualização
        });

        // Alterar a coluna 'imagem' para MEDIUMBLOB
        DB::statement('ALTER TABLE materiais MODIFY imagem MEDIUMBLOB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
