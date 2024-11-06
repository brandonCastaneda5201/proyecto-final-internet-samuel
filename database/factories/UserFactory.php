<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use App\Models\Libro;
use App\Models\Compra;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'apellido' => $this->faker->lastName(), 
            'telefono' => $this->faker->phoneNumber(), 
            'direccion' => $this->faker->address(), 
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name.'\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
    public function configure(){
        return $this->afterCreating(function (User $usuario) {
             // Get all Libro records and choose one at random
             $randomLibro = Libro::inRandomOrder()->first();
            
             if ($randomLibro && $usuario) {
                 // Use the Compra factory to create a Compra associated with the random libro and user
                 Compra::factory()->create([
                     'user_id' => $usuario->id,
                     'libro_id' => $randomLibro->id,
                 ]);
             }
        });
    }
}
