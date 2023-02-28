<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartmentsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(IdeasSeeder::class);
        $this->call(IdeaUsersSeeder::class);
        $this->call(CommentsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(CategoryIdeasSeeder::class);
        $this->call(DocumentsSeeder::class);
    }
}
