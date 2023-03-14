<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\Idea;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Idea $idea)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->role === "staff") {
            $latestEvent = Event::latest()->first();
            $eventOpenDate = Carbon::parse($latestEvent->open_date);
            $eventClosureDate = Carbon::parse($latestEvent->first_closure_date);
            return (Carbon::now()->gte($eventOpenDate) && Carbon::now()->lte($eventClosureDate))
                ? Response::allow()
                : Response::deny("You can't post idea when there is no event available");
        } else {
            return Response::deny("You do not have the right to post idea.");
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Idea $idea)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Idea $idea)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Idea $idea)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Idea $idea)
    {
        //
    }
}
