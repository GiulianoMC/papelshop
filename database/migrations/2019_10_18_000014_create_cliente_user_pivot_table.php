<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('cliente_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_483484')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('cliente_id');

            $table->foreign('cliente_id', 'cliente_id_fk_483484')->references('id')->on('clientes')->onDelete('cascade');
        });
    }
}
