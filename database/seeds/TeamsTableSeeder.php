<?php

use App\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    public function run()
    {
        $teams = [
            [
                'id'             => 1,
                'name'           => 'GCampra',
            ],
        ];

        Team::insert($teams);

    }
}
