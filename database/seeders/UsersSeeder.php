<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Department;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'role' => 'admin',
        ]);

        User::factory()->create([
            'role' => 'manager',
        ]);

        User::factory(3)->create([
            'role' => 'coordinator',
        ])->each(function ($coordinator) {

            //check if coordinator is already assgined to a department
            $departmentDetail1 = Department::find($coordinator->department_id);

            //check that the department cannot be found aka coordinator is not assigned
            if (!$departmentDetail1) {
                $deapartments = Department::all();

                //Pick the ID from a random Department generated before
                while (true) {
                    //Pick the random ID
                    $departmentId = $deapartments->random()->id;

                    //Check if the randomly picked Department's ID is already assigned
                    $departmentAssigned = User::where('department_id', $departmentId)->first();
                    if (!$departmentAssigned) {
                        break;
                    }
                }

                //Update in User table
                $coordinator->update(['department_id' => $departmentId]);

                //Find the Department we just picked randomly
                $department = Department::find($departmentId);

                //Assign the current User's ID to the FK on Department table
                $department->coordinator_id = $coordinator->id;

                //Persists to Database
                $department->save();
            }
        });

        $users = User::factory(5)
            ->create([
                'role' => 'staff'
            ])->each(function ($staff) {
                $staff->update(['department_id' => Department::all()->random()->id]);
                Idea::factory(5)->create(['user_id' => $staff->id])->each(function ($idea) {
                    Comment::factory(3)
                        ->has(Comment::factory(2)
                            ->state(function (array $attributes, Comment $comment) {
                                return ['parent_id' => $comment->id, 'idea_id' => $comment->idea_id];
                            }))
                        ->create(['idea_id' => $idea->id]);
                });
            });

        $votes = [-1, 1];
        Idea::factory()->count(10)->hasAttached($users, fn() => ['like' => $votes[rand(0,1)]], 'votedUsers')->create();
    }
}
