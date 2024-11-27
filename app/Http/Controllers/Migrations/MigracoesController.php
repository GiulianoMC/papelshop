<?php

namespace App\Http\Controllers\Migrations;

use App\Http\Controllers\Controller;
use App\Pessoa;
use App\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MigracoesController extends Controller
{
    public static function limpatabelas()
    {
        DB::statement("SET foreign_key_checks=0");
        Pessoa::truncate();
        Cliente::truncate();
        DB::statement("SET foreign_key_checks=1");
    }

    public static function migracedentes()
    {
        DB::connection('sqlsrv')
            ->table('dbo.SIGCAD')
            ->where('TIPO','=','Cedente')
            ->where('NOME','<>',null)
            ->orderBy('CODIGO')
            ->chunk(500, function ($pessoasmigracao) {

                foreach ($pessoasmigracao as $pessoamigracao) {

                    $pessoa = new Pessoa();
                    $pessoa->id = $pessoamigracao->CODIGO;
                    $pessoa->nome = $pessoamigracao->NOME;
                    $pessoa->cpfcnpj = preg_replace('/[^0-9]/', '', $pessoamigracao->CGC);
                    $pessoa->tipo = $pessoamigracao->tipopessoa == 'J' ? 'PJ' : 'PF';
                    $pessoa->email = $pessoamigracao->EMAIL;
                    $pessoa->fone = $pessoamigracao->FONE;
                    $pessoa->cep = $pessoamigracao->CEP;
                    $pessoa->logradouro = $pessoamigracao->LOGRADOURO;
                    $pessoa->numero = $pessoamigracao->NUMERO;
                    $pessoa->bairro = $pessoamigracao->BAIRRO;
                    $pessoa->complemento = $pessoamigracao->COMPL;
                    $pessoa->cidade = $pessoamigracao->CIDADE;
                    $pessoa->uf = $pessoamigracao->ESTADO;

                    $pessoa->save();

                    $pessoa->perfils()->sync(2);

                    $cliente = new Cliente();
                    $cliente->pessoa_id = $pessoa->id;
                    $cliente->gerente_id = 1;

                    $cliente->save();

                }

            });

        return 'Cedentes Migrados';

    }

}
