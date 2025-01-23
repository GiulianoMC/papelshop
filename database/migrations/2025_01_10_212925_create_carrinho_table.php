<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhoTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('quantidade')->default(1);
            $table->unsignedBigInteger('material_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            // Definição de chaves estrangeiras
            $table->foreign('material_id')->references('id')->on('materiais')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrinhos');
    }
}
