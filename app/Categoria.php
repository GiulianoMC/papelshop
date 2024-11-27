<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Nome da tabela (opcional se seguir a convenção)
    protected $table = 'categorias';

    // Chave primária (opcional se for 'id')
    protected $primaryKey = 'id';

    // Atributos que podem ser preenchidos em massa
    protected $fillable = ['nome'];

    public function materiais()
    {
        return $this->hasMany(Material::class);
    } 

}


