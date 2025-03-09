<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'status' => fake()->randomElement(['todo', 'in_progress', 'done']),
            'due_date' => fake()->dateTimeBetween('now', '+1 year'),
            'created_by' => User::factory(),
            'assigned_to' => User::factory(),
        ];
    }
}
