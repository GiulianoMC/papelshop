<?php

use App\Pessoa;
use Illuminate\Database\Seeder;

class PessoasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pessoas = [
            [
                'id' => 1,
                'nome' => 'Empresa Campra',
                'cpfcnpj' => '46584583000146',
                'email' => 'empresa@gcampra.com.br',
                'tipo' => 'PJ',
                'fone' => '1532053083',
                'celular' => '15981518823',
                'cep' => '18273783',
                'logradouro' => 'Rua Afonso Poles',
                'numero' => '139',
                'bairro' => 'Parque Residencial São Marcos',
                'cidade' => 'Tatuí',
                'uf' => 'SP',
                'created_at' => today()
            ],
            [
                'id' => 2,
                'nome' => 'Gino Campra',
                'cpfcnpj' => '64061558072',
                'email' => 'gino@gcampra.com.br',
                'tipo' => 'PF',
                'fone' => '1532053083',
                'celular' => '15981518823',
                'cep' => '18273783',
                'logradouro' => 'Rua Afonso Poles',
                'numero' => '139',
                'bairro' => 'Parque Residencial São Marcos',
                'cidade' => 'Tatuí',
                'uf' => 'SP',
                'created_at' => today()
            ],
            [
                'id' => 3,
                'nome' => 'Giuliano Campra',
                'cpfcnpj' => '48586608009',
                'email' => 'giu@gcampra.com.br',
                'tipo' => 'PF',
                'fone' => '1532053083',
                'celular' => '15981518823',
                'cep' => '18273783',
                'logradouro' => 'Rua Afonso Poles',
                'numero' => '139',
                'bairro' => 'Parque Residencial São Marcos',
                'cidade' => 'Tatuí',
                'uf' => 'SP',
                'created_at' => today()
            ],
            [
                'id' => 4,
                'nome' => 'Luigi Campra',
                'cpfcnpj' => '37033793081',
                'email' => 'luigi@gcampra.com.br',
                'tipo' => 'PF',
                'fone' => '1532053083',
                'celular' => '15981518823',
                'cep' => '18273783',
                'logradouro' => 'Rua Afonso Poles',
                'numero' => '139',
                'bairro' => 'Parque Residencial São Marcos',
                'cidade' => 'Tatuí',
                'uf' => 'SP',
                'created_at' => today()
            ],
            [
                'id' => 5,
                'nome' => 'Cliente 1',
                'cpfcnpj' => '46584583000146',
                'email' => 'cliente1@gcampra.com.br',
                'tipo' => 'PJ',
                'fone' => '1532053083',
                'celular' => '15981518823',
                'cep' => '18273783',
                'logradouro' => 'Rua Afonso Poles',
                'numero' => '139',
                'bairro' => 'Parque Residencial São Marcos',
                'cidade' => 'Tatuí',
                'uf' => 'SP',
                'created_at' => today()
            ],
            [
                'id' => 6,
                'nome' => 'Cliente 2',
                'cpfcnpj' => '46584583000146',
                'email' => 'cliente2@gcampra.com.br',
                'tipo' => 'PJ',
                'fone' => '1532053083',
                'celular' => '15981518823',
                'cep' => '18273783',
                'logradouro' => 'Rua Afonso Poles',
                'numero' => '139',
                'bairro' => 'Parque Residencial São Marcos',
                'cidade' => 'Tatuí',
                'uf' => 'SP',
                'created_at' => today()
            ],
        ];

        Pessoa::insert($pessoas);
    }
}
