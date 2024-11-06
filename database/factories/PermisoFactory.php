<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permiso>
 */
class PermisoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'show-libro' => true,
            'create-libro' => true,
            'edit-libro' => true,
            'delete-libro' => true,
            'show-cliente' => true,
            'create-cliente' => true,
            'edit-cliente' => true,
            'delete-cliente' => true,
            'show-etiqueta' => true,
            'create-etiqueta' => true,
            'edit-etiqueta' => true,
            'delete-etiqueta' => true,
            'show-permiso' => true,
            'edit-permiso' => true,
            'show-compra' => true,
            'create-compra' => true,
            'edit-compra' => true,
            'delete-compra' => true,
            'compra-libro' => true,
            'user_id' => User::factory(),
        ];
    }
}
