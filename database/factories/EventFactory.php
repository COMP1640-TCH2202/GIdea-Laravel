<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'open_date' => Carbon::now()->toDateString(),
            'first_closure_date' => Carbon::now()->addWeek()->toDateString(),
            'final_closure_date' => Carbon::now()->addWeeks(2)->toDateString()
        ];
    }
}
