<?php

namespace Tests\Feature;

use App\Models\Libro;
use App\Models\User;
use App\Models\Etiqueta;
use App\Models\Permiso;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LibroControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_crear_libro(): void{
        $etiquetas = Etiqueta::factory()->count(4)->create();
        $libros = Libro::factory()->make();
        $file = UploadedFile::fake()->image('cover.jpg');
        $libros->portada = $file;
        $libros->etiquetas = $etiquetas;
        $user = User::factory()->has(Permiso::factory()->state(function (array $attributes, User $user) {
            return ['user_id' => $user->id];
        }))->create();
        $response = $this->actingAs($user)->post(route("libro.store"), $libros->toArray());
        $response->assertStatus(302);
        $response->assertRedirect(route("libro.index"));
        $this->assertDatabaseHas('libros', [
            'titulo' => $libros->titulo,
            'autor' => $libros->autor,
            'editorial' => $libros->editorial,
            'edicion' => $libros->edicion,
            'stock' => $libros->stock,
            'precio' => $libros->precio,
        ]);
    }

    public function test_vista_libro(): void{
        $etiquetas = Etiqueta::factory()->count(4)->create();
        $libros = Libro::factory()->create();
        $user = User::factory()->has(Permiso::factory()->state(function (array $attributes, User $user) {
            return ['user_id' => $user->id];
        }))->create();
        $response = $this->actingAs($user)->get(route("libro.index"));
        $response->assertStatus(200);
        $response->assertSee($libros->titulo);
    }

    public function test_crear_libro_incompleto(): void{
        $etiquetas = Etiqueta::factory()->count(4)->create();
        $libros = Libro::factory()->make();
        $libros->titulo = '';
        $libros->sinopsis = '';
        $libros->etiquetas = $etiquetas;
        $user = User::factory()->has(Permiso::factory()->state(function (array $attributes, User $user) {
            return ['user_id' => $user->id];
        }))->create();
        $response = $this->actingAs($user)->post(route("libro.store"), $libros->toArray());
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['titulo', 'sinopsis']);
    }

    public function test_eliminar_libro(): void{
        $etiquetas = Etiqueta::factory()->count(4)->create();
        $libros = Libro::factory()->create();
        $user = User::factory()->has(Permiso::factory()->state(function (array $attributes, User $user) {
            return ['user_id' => $user->id];
        }))->create();
        $response = $this->actingAs($user)->delete(route("libro.destroy", $libros->id));
        $response->assertStatus(302);
        $response->assertRedirect(route("libro.index"));
        $response->assertSessionHas('success', 'Libro eliminado con exito.');
    }
}
