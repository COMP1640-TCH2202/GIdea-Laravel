<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => fake()->text(100),
            'anonymous' => fake()->boolean(),
            'idea_id' => rand(1,20),
            'user_id' => rand(1,10),
            // 'parent_id' => rand(1,10)
        ];
    }
}