<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$OHs2TNntgCCJaTlTdFaDXeNk9XvUQTUoJ/tusQMmDXSWVvFqIZOpK',
                'remember_token' => null,
                'team_id'        => '1',
            ],
            [
                'id'             => 2,
                'name'           => 'Diretor',
                'email'          => 'diretor@admin.com',
                'password'       => '$2y$10$OHs2TNntgCCJaTlTdFaDXeNk9XvUQTUoJ/tusQMmDXSWVvFqIZOpK',
                'remember_token' => null,
                'team_id'        => '1',
            ],
            [
                'id'             => 3,
                'name'           => 'Funcionario',
                'email'          => 'funcionario@admin.com',
                'password'       => '$2y$10$OHs2TNntgCCJaTlTdFaDXeNk9XvUQTUoJ/tusQMmDXSWVvFqIZOpK',
                'remember_token' => null,
                'team_id'        => '1',
            ],
            [
                'id'             => 4,
                'name'           => 'Gerente 1',
                'email'          => 'gerente1@admin.com',
                'password'       => '$2y$10$OHs2TNntgCCJaTlTdFaDXeNk9XvUQTUoJ/tusQMmDXSWVvFqIZOpK',
                'remember_token' => null,
                'team_id'        => '1',
            ],
            [
                'id'             => 5,
                'name'           => 'Gerente 2',
                'email'          => 'gerente2@admin.com',
                'password'       => '$2y$10$OHs2TNntgCCJaTlTdFaDXeNk9XvUQTUoJ/tusQMmDXSWVvFqIZOpK',
                'remember_token' => null,
                'team_id'        => '1',
            ],
        ];

        User::insert($users);
    }
}
