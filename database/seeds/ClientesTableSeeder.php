<?php

use App\Cliente;
use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [
            [
                'id' => 1,
                'pessoa_id' => 4,
                'gerente_id' => 1,
                'created_at' => today()
            ],
            [
                'id' => 2,
                'pessoa_id' => 5,
                'gerente_id' => 1,
                'created_at' => today()
            ],
        ];

        Cliente::insert($clientes);
    }
}
