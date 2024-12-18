<?php

namespace App\Policies;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LibroPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->permiso->getAttribute('show-libro');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Libro $libro): bool
    {
        return $user->permiso->getAttribute('show-libro');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->permiso->getAttribute('create-libro');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Libro $libro): bool
    {
        return $user->permiso->getAttribute('edit-libro');
    }

    public function edit(User $user): bool
    {
        return $user->permiso->getAttribute('edit-libro');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Libro $libro): bool
    {
        return $user->permiso->getAttribute('delete-libro');
    }

    public function comprar(User $user, Libro $model): bool
    {
        return $user->permiso->getAttribute('compra-libro');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Libro $libro): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Libro $libro): bool
    {
        //
    }
}
