<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frete extends Model
{
    // Nome da tabela (opcional se seguir a convenção)
    protected $table = 'fretes';

    // Chave primária (opcional se for 'id')
    protected $primaryKey = 'id';

    // Atributos que podem ser preenchidos em massa
    protected $fillable = ['estado', 'valor'];

}


