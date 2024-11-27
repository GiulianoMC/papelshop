<?php

use Illuminate\Database\Seeder;
use App\Material;

class MateriaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materiais = [
            [
                'nome' => 'Caderno de Anotações', 
                'marca' => 'Tilibra', 
                'categoria_id' => 1, 
                'preco' => 9.99, 
                'descricao' => 'Caderno universitário, 100 folhas', 
                'data_compra' => '2024-01-15', 
                'disponivel' => 1
            ],
            [
                'nome' => 'Caneta Azul', 
                'marca' => 'BIC', 
                'categoria_id' => 2, 
                'preco' => 1.50, 
                'descricao' => 'Caneta esferográfica azul', 
                'data_compra' => '2024-01-20', 
                'disponivel' => 1
            ],
            [
                'nome' => 'Lápis Preto', 
                'marca' => 'Faber-Castell', 
                'categoria_id' => 2, 
                'preco' => 0.75, 
                'descricao' => 'Lápis de madeira, 12 unidades', 
                'data_compra' => '2024-01-18', 
                'disponivel' => 1
            ],
            [
                'nome' => 'Mochila Escolar', 
                'marca' => 'Nike', 
                'categoria_id' => 6, 
                'preco' => 129.90, 
                'descricao' => 'Mochila de costas, material impermeável', 
                'data_compra' => '2024-02-05', 
                'disponivel' => 1
            ],
            [
                'nome' => 'Giz de Cera', 
                'marca' => 'Crayola', 
                'categoria_id' => 5, 
                'preco' => 15.99, 
                'descricao' => 'Kit com 24 cores', 
                'data_compra' => '2024-02-10', 
                'disponivel' => 1
            ],
            [
                'nome' => 'Papel A4', 
                'marca' => 'Chamex', 
                'categoria_id' => 4, 
                'preco' => 18.99, 
                'descricao' => 'Papel sulfite A4, pacote com 500 folhas', 
                'data_compra' => '2024-03-01', 
                'disponivel' => 1
            ],
            [
                'nome' => 'Livro de Matemática', 
                'marca' => 'Editora FTD', 
                'categoria_id' => 11, 
                'preco' => 79.90, 
                'descricao' => 'Livro didático de matemática, 6ª série', 
                'data_compra' => '2024-03-10', 
                'disponivel' => 1
            ],
            [
                'nome' => 'Calculadora Científica', 
                'marca' => 'Casio', 
                'categoria_id' => 12, 
                'preco' => 99.90, 
                'descricao' => 'Calculadora científica, modelo fx-82', 
                'data_compra' => '2024-03-12', 
                'disponivel' => 1
            ],
            [
                'nome' => 'Apontador', 
                'marca' => 'Faber-Castell', 
                'categoria_id' => 2, 
                'preco' => 2.50, 
                'descricao' => 'Apontador de lápis com depósito', 
                'data_compra' => '2024-03-15', 
                'disponivel' => 1
            ],
            [
                'nome' => 'Canetas Coloridas', 
                'marca' => 'Pilot', 
                'categoria_id' => 2, 
                'preco' => 10.00, 
                'descricao' => 'Canetas esferográficas coloridas, pacote com 12 unidades', 
                'data_compra' => '2024-03-20', 
                'disponivel' => 1
            ],
        ];

        Material::insert($materiais);
    }
}
