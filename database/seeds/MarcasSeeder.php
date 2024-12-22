<?php

use Illuminate\Database\Seeder;
use App\Marca;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas = [
            ['nome' => 'Faber-Castell'],
            ['nome' => 'Casio'],
            ['nome' => 'Editora FTD'],
            ['nome' => 'Chamex'],
            ['nome' => 'Crayola'],
            ['nome' => 'Nike'],
            ['nome' => 'BIC'],
            ['nome' => 'Tilibra'],
        ];

        Marca::insert($marcas);
    }
}
