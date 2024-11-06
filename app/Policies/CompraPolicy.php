<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Compra;

class CompraPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->permiso->getAttribute('show-compra');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Compra $model): bool
    {
        return $user->permiso->getAttribute('show-compra');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->permiso->getAttribute('create-compra');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Compra $model): bool
    {
        return $user->permiso->getAttribute('edit-compra');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Compra $model): bool
    {
        return $user->permiso->getAttribute('delete-compra');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Compra $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Compra $model): bool
    {
        //
    }
}
