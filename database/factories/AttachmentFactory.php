<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'file_path' => fake()->filePath(),
            'file_type' => fake()->fileExtension(),
            'task_id' => Task::factory(),
        ];
    }
}
