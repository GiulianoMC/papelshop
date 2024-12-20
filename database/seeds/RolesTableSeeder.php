<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Diretor',
            ],
            [
                'id'    => 3,
                'title' => 'Funcionário',
            ],
            [
                'id'    => 4,
                'title' => 'Gerente Negócios',
            ],
        ];

        Role::insert($roles);
    }
}
