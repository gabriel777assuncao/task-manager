<?php

namespace Database\Factories;

use App\Models\{Task, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content' => fake()->paragraph,
            'task_id' => Task::factory(),
            'user_id' => User::factory(),
        ];
    }
}
