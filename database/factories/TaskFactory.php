<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task' => fake()->realText(20),
            'description' => fake()->realText(200),
            'status' => '1',
            'priority' => '1',
            'deadline' => $this->faker->dateTimeBetween('now', '+1 month'),
            'user_session' => 1,
        ];
    }
}
