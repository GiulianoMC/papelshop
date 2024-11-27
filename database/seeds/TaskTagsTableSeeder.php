<?php

use App\TaskTag;
use Illuminate\Database\Seeder;

class TaskTagsTableSeeder extends Seeder
{
    public function run()
    {
        $taskTags = [
            [
                'id'   => '1',
                'name' => 'Importante',
            ],
            [
                'id'   => '2',
                'name' => 'Problema',
            ],
        ];

        TaskTag::insert($taskTags);
    }
}
