<?php

namespace App\Policies;

use App\Models\Pqrs;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PqrsPolicy
{
    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return null;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin') || $user->hasRole('operador');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pqrs $pqrs): bool
    {
        return $user->hasRole('admin') || $user->hasRole('operador');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pqrs $pqrs): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pqrs $pqrs): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pqrs $pqrs): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pqrs $pqrs): bool
    {
        return $user->hasRole('admin');
    }
}
