<?php

use App\Pessoa;
use Illuminate\Database\Seeder;

class PessoasPerfilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Pessoa::findOrFail(1)->perfils()->sync(4);
        Pessoa::findOrFail(2)->perfils()->sync(2);
        Pessoa::findOrFail(2)->perfils()->sync(2);
        Pessoa::findOrFail(3)->perfils()->sync(2);
        Pessoa::findOrFail(4)->perfils()->sync([1,3]);
        Pessoa::findOrFail(5)->perfils()->sync([1,3]);

    }
}
