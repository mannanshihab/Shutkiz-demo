<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContactPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->SuperAdmin() || $user->Admin() || $user->Moderator();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Contact $contact): bool
    {
        return $user->SuperAdmin() || $user->Admin() || $user->Moderator();
    }

    /**
     * Determine whether the user can create models.
     */
    

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Contact $contact): bool
    {
        return $user->SuperAdmin() || $user->Admin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Contact $contact): bool
    {
        return $user->SuperAdmin() || $user->Admin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Contact $contact): bool
    {
        return $user->SuperAdmin() || $user->Admin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Contact $contact): bool
    {
        return $user->SuperAdmin() || $user->Admin();
    }

    public function deleteAny(User $user): bool
    {
        return $user->SuperAdmin() || $user->Admin();
    }
    public function restoreAny(User $user): bool
    {
        return $user->SuperAdmin() || $user->Admin();
    }
    public function forceDeleteAny(User $user): bool
    {
        return $user->SuperAdmin() || $user->Admin();
    }
}
