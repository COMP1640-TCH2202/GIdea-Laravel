<?php

namespace Database\Seeders;

use App\Models\CategoryIdea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryIdeasSeeder extends Seeder
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
