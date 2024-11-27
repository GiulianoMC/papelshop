<?php

use App\Empresa;
use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresas = [
            [
                'id' => 1,
                'pessoa_id' => 1,
                'tipo' => 'EE',
                'created_at' => today()
            ],
        ];

        Empresa::insert($empresas);
    }
}
