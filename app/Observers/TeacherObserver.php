<?php

namespace App\Observers;

use App\Models\User;

class TeacherObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updating(User $user)
    {
        if ($user->role !== 'teacher') return;

        // hapus initial_password hanya jika password diubah (update)
        if ($user->isDirty('password') && $user->teacher_profile?->initial_password) {
            $user->teacher_profile->update([
                'initial_password' => null,
            ]);
        }
    }
    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
