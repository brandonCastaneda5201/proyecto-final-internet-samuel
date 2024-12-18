<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Permiso;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'direccion' => $input['direccion'],
            'telefono' => $input['telefono'],
            'apellido' => $input['apellido'],
            'password' => Hash::make($input['password']),
        ]);

        Permiso::create([
            'user_id' => $user->id,
            'show-libro' => true,
            'create-libro' => false,
            'edit-libro' => false,
            'delete-libro' => false,
            'show-cliente' => false,
            'create-cliente' => false,
            'edit-cliente' => false,
            'delete-cliente' => false,
            'show-etiqueta' => false,
            'create-etiqueta' => false,
            'edit-etiqueta' => false,
            'delete-etiqueta' => false,
            'show-permiso' => false,
            'edit-permiso' => false,
            'show-compra' => false,
            'create-compra' => false,
            'edit-compra' => false,
            'delete-compra' => false,
            'compra-libro' => true,
        ]);

        return $user;
    }
}
