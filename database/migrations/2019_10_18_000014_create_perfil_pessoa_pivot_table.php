<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilPessoaPivotTable extends Migration
{
    public function up()
    {
        Schema::create('perfil_pessoa', function (Blueprint $table) {
            $table->unsignedInteger('pessoa_id');

            $table->foreign('pessoa_id', 'pessoa_id_fk_483482')->references('id')->on('pessoas')->onDelete('cascade');

            $table->unsignedInteger('perfil_id');

            $table->foreign('perfil_id', 'perfil_id_fk_483482')->references('id')->on('perfils')->onDelete('cascade');
        });
    }
}
