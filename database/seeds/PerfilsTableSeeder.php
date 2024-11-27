<?php

use App\Perfil;
use Illuminate\Database\Seeder;

class PerfilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfis = [
            [
                'id'             => 1,
                'perfil'           => 'Perfil 1',
            ],
            [
                'id'             => 2,
                'perfil'           => 'Perfil 2',
            ],
            [
                'id'             => 3,
                'perfil'           => 'Cliente',
            ],
            [
                'id'             => 4,
                'perfil'           => 'Empresa',
            ],
        ];

        Perfil::insert($perfis);
    }
}
