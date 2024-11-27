<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmpresasTable extends Migration
{
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->unsignedInteger('pessoa_id');

            $table->foreign('pessoa_id', 'pessoa_fk_484541')->references('id')->on('pessoas');
        });
    }
}
