<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            ['nome' => 'Cadernos e Blocos'],
            ['nome' => 'Canetas e Lápis'],
            ['nome' => 'Marcadores e Esferográficas'],
            ['nome' => 'Papelaria Diversa'],
            ['nome' => 'Materiais de Arte'],
            ['nome' => 'Mochilas e Estojos'],
            ['nome' => 'Calculadoras e Regra'],
            ['nome' => 'Material de Educação Física'],
            ['nome' => 'Papel e Cartolina'],
            ['nome' => 'Itens para Escritório'],
            ['nome' => 'Livros Didáticos'],
            ['nome' => 'Livros de Leitura'],
            ['nome' => 'Equipamentos Tecnológicos'],
            ['nome' => 'Giz e Quadros'],
            ['nome' => 'Organizadores e Pastas'],
        ];

        Categoria::insert($categorias);
    }
}
