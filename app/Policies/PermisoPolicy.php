<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Permiso;
use Illuminate\Auth\Access\Response;

class PermisoPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->permiso->getAttribute('show-permiso');
    }
    public function update(User $user, Permiso $permiso): bool
    {
        return $user->permiso->getAttribute('edit-permiso');
    }
}
