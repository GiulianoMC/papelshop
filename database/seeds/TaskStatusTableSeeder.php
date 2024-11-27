<?php

use App\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusTableSeeder extends Seeder
{
    public function run()
    {
        $taskStatuses = [
            [
                'id'   => '1',
                'name' => 'Aberta',
            ],
            [
                'id'   => '2',
                'name' => 'Em Andamento',
            ],
            [
                'id'   => '3',
                'name' => 'Concluida',
            ],
        ];

        TaskStatus::insert($taskStatuses);
    }
}
