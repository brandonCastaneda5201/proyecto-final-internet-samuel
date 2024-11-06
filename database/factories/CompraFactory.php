<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compra>
 */
class CompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        public function definition(): array
        {
            return [
                'user_id' => \App\Models\User::factory(), 
                'libro_id' => \App\Models\Libro::factory(), 
                'precio' => $this->faker->randomFloat(2, 1, 1000), 
                'stock' => $this->faker->numberBetween(1, 1000), 
                'estado' => $this->faker->randomElement(['cancelado', 'completado', 'pagado', 'reservado']), 
                'fecha_cambio_estado' => $this->faker->optional()->dateTime(), 
            ];
        }
}
