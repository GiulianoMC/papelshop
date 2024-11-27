<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilsTable extends Migration
{
    public function up()
    {
        Schema::create('perfils', function (Blueprint $table) {
            $table->increments('id');

            $table->string('perfil')->unique();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
