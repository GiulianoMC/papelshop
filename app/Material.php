<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    // Nome da tabela (opcional se seguir a convenção)
    protected $table = 'materiais';

    // Chave primária (opcional se for 'id')
    protected $primaryKey = 'id';

    // Atributos que podem ser preenchidos em massa
    protected $fillable = ['nome', 'marca', 'categoria_id', 'preco', 'descricao', 'data_compra', 'disponivel'];

    // Relação com a tabela 'categorias'
    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }

}


