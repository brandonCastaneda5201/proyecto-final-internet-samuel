<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Etiqueta;
use Illuminate\Auth\Access\Response;

class EtiquetaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->permiso->getAttribute('show-etiqueta');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->permiso->getAttribute('create-etiqueta');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Etiqueta $etiqueta): bool
    {
        return $user->permiso->getAttribute('edit-etiqueta');
    }

    public function edit(User $user): bool
    {
        return $user->permiso->getAttribute('edit-etiqueta');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Etiqueta $etiqueta): bool
    {
        return $user->permiso->getAttribute('delete-etiqueta');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Etiqueta $etiqueta): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Etiqueta $etiqueta): bool
    {
        //
    }
}
