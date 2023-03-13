<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idea>
 */
class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(5,10),
            'event_id' => 1,
            'title' => fake()->text(50),
            'content' => fake()->text(200),
            'anonymous' => fake()->boolean(),
        ];
    }
}
