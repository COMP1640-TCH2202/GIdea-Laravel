<?php

namespace Database\Seeders;

use App\Models\CategoryIdea;
use Illuminate\Database\Seeder;

class CategoryIdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryIdea::factory()->times(15)->create();
    }
}
