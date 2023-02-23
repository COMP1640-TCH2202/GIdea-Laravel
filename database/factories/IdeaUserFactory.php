<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IdeaUser>
 */
class IdeaUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $votes = [-1, 0, 1];
        
        return [
            'idea_id' => rand(1, 20),
            'user_id' => rand(1,10),
            'like' => $votes[rand(0,2)]
        ];
    }
}
