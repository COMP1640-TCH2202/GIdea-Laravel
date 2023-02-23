<?php

namespace Database\Seeders;

use App\Models\IdeaUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdeaUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IdeaUser::factory()->times(50)->create();
    }
}
