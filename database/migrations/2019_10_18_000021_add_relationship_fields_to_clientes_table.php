<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToClientesTable extends Migration
{
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->unsignedInteger('pessoa_id');

            $table->foreign('pessoa_id', 'pessoa_fk_484540')->references('id')->on('pessoas');

            $table->unsignedInteger('gerente_id');

            $table->foreign('gerente_id', 'user_fk_484540')->references('id')->on('users');
        });
    }
}
