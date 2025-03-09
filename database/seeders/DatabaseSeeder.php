<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Attachment;
use App\Models\Notification;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            $tasks = Task::factory(5)->create(['created_by' => $user->id, 'assigned_to' => $user->id]);
            $tags = Tag::factory(3)->create();

            $tasks->each(function ($task) use ($tags) {
                $task->tags()->attach($tags->random(2));
                Comment::factory(3)->create(['task_id' => $task->id, 'user_id' => $task->created_by]);
                Attachment::factory(2)->create(['task_id' => $task->id]);
            });

            Notification::factory(5)->create(['user_id' => $user->id]);
        });
    }
}
