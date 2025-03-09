<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
