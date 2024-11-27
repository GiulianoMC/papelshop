<?php

use App\Cliente;
use Illuminate\Database\Seeder;

class ClientesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Cliente::findOrFail(1)->users()->sync([1,2,3]);
        Cliente::findOrFail(2)->users()->sync([1,2]);

    }
}
