<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'message' => fake()->sentence,
            'user_id' => User::factory(),
            'is_read' => fake()->boolean,
        ];
    }
}
