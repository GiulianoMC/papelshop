<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nome');

            $table->string('cpfcnpj')->nullable();

            $table->string('email')->nullable();

            $table->string('tipo');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
