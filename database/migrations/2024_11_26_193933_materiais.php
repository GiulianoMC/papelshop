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
            $table->bigIncrements('id'); // Cria a chave primária como 'unsignedBigInteger'
            $table->string('nome'); // Nome do material escolar
            $table->string('marca'); // Marca do material (ex.: Faber-Castell, Bic)
            $table->decimal('preco', 8, 2); // Preço do material (até 999,999.99)
            $table->text('descricao')->nullable(); // Descrição do material
            $table->date('data_compra')->nullable(); // Data de compra do material
            $table->boolean('disponivel')->default(true); // Disponibilidade (sim ou não)
            $table->timestamps(); // Cria 'created_at' e 'updated_at'
        });
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
