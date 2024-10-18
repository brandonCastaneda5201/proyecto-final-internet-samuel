<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Libro;
use App\Models\Etiqueta;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence,  
            'autor' => $this->faker->name,  
            'editorial' => $this->faker->company,  
            'edicion' => $this->faker->randomElement(['1ra', '2da', '3ra']),  
            'sinopsis' => $this->faker->paragraph, 
            'stock' => $this->faker->numberBetween(1, 100), 
            'fecha_publicacion' => $this->faker->date,  
            'paginas' => $this->faker->numberBetween(50, 500),  
        ];
    }

    public function configure(){
        return $this->afterCreating(function (Libro $libro) {
            $etiquetas = Etiqueta::all();
            $etiquetasAleatorias = $etiquetas->random(rand(1, $etiquetas->count()));
            $libro->etiquetas()->attach($etiquetasAleatorias->pluck('id')->toArray());
        });
    }
}
