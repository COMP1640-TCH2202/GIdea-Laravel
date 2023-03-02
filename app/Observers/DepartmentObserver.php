<?php

namespace App\Observers;

use App\Models\Department;
use App\Models\User;

class DepartmentObserver
{
    /**
     * Handle the Department "created" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function created(Department $department)
    {
        if ($department->coordinator_id) {
            $user = User::find($department->coordinator_id);
            $user->department_id = $department->id;
            $user->save();
        }
    }

    /**
     * Handle the Department "updating" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function updating(Department $department)
    {
        $user = User::find($department->getOriginal('coordinator_id'));
        $user->department_id = null;
        $user->save();
    }

    /**
     * Handle the Department "updated" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function updated(Department $department)
    {
        if ($department->wasChanged('coordinator_id')) {
            $user = User::find($department->coordinator_id);
            $user->department_id = $department->id;
            $user->save();
        }
    }

    /**
     * Handle the Department "deleted" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function deleted(Department $department)
    {
        //
    }

    /**
     * Handle the Department "restored" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function restored(Department $department)
    {
        //
    }

    /**
     * Handle the Department "force deleted" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function forceDeleted(Department $department)
    {
        //
    }
}
