<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('boolean') as $task) {
            Task::create([
                'done' => $task['done'],
                'urgent' => $task['urgent'],
                'creation_date' => $task['creation_date'],
                'expire_date' => $task['expire_date'],
                'title' => $task['title'],
                'details' => $task['details'],
                'image' => $task['image'],
            ]);
        }
    }
}
