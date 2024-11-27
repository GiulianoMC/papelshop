<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFoneTablePessoas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pessoas', function (Blueprint $table) {

            $table->string('fone')->nullable();

            $table->string('celular')->nullable();

            $table->string('cep')->nullable();

            $table->string('logradouro')->nullable();

            $table->string('numero')->nullable();

            $table->string('bairro')->nullable();

            $table->string('complemento')->nullable();

            $table->string('cidade')->nullable();

            $table->string('uf')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pessoas', function (Blueprint $table) {

            $table->dropColumn('fone');

            $table->dropColumn('celular');

            $table->dropColumn('cep');

            $table->dropColumn('logradouro');

            $table->dropColumn('numero');

            $table->dropColumn('bairro');

            $table->dropColumn('complemento');

            $table->dropColumn('cidade');

            $table->dropColumn('uf');

        });
    }
}
