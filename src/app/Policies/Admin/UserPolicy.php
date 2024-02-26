<?php

namespace App\Policies\Admin;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function browse(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function read(User $user, User $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function add(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function edit(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return true;
    }
}
