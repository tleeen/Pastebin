<?php

namespace App\Policies\Admin;

use App\Models\Complaint;
use App\Models\User;

class ComplaintPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function browse(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function read(User $user, Complaint $complaint): bool
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
    public function edit(User $user, Complaint $complaint): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Complaint $complaint): bool
    {
        return false;
    }
}
