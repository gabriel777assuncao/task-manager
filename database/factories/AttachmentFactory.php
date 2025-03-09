<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;

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
